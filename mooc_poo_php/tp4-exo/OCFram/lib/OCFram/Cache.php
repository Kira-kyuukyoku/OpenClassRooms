<?php
namespace OCFram;

class Cache extends ApplicationComponent
{
    protected $pointeur;

    public function __construct()
    {

    }

    /*Cette fonction teste l'existence d'un fichier de cache et sa validité, si tout est bon on renvoie true sinon false.*/
    public function cacheExist($fichier, $cacheDir, $cacheDuree)
    {
        $cacheDuree = $this->app->config()->get('cache_duree');
        $cacheDir   = $this->app->config()->get('cache_dir');

        $unserialize = unserialize($cacheDir.$fichier);

        // Si ma cache est encore valide sinon
        if( $unserialize['life'] > time() )
        {
            return true
        }
        else
        {
           return false
        }
    }

    /*Cette fonction met en cache si tout n'est pas bon, id est si il n'y a pas eu readfile puis exit.*/
    public function createCache($content)
    {
        $cacheLife = DateInterval::createFromDateString('1 day');

        $data = array('expire'=>$cacheLife,'content'=>$content);
        echo serialize($data);

        $this->pointeur = fopen($this->fichier, 'w');
        fwrite($this->pointeur, ob_get_contents());
        fclose($this->pointeur);
        ob_end_flush;
    }

    /*Cette fonction supprime le fichier en cache.*/
    public function deleteCache($fichier, $cacheDir)
    {
        unlink($cacheDir.$fichier);
    }


    /*Cette fonction supprime tout les fichiers en cache.*/
    public function purgeCache($cacheDir)
    {
        // On ouvre le dossier.
        $repertoire = opendir($cacheDir);

        // On lance notre boucle qui lira les fichiers un par un.
                while(false !== ($fichier = readdir($repertoire)))
                {
                // On met le chemin du fichier dans une variable simple.
                $chemin = $cacheDir."/".$fichier;

        // On n'oublie pas LA condition sous peine d'avoir quelques surprises. :p
                        if($fichier!="." AND $fichier!=".." AND !is_dir($fichier))
                        {
                            unlink($chemin);
                        }
                }
        closedir($repertoire); // On ferme !
    }


}