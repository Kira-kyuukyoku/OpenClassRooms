# TP Mooc Linux d'OpenClassRooms.
___

## Exercie
Réaliser un générateur de galerie d'images en bash.

Au final le script :

    * créer une miniature de chaque image du dossier

    * générer un fichier HTML et y insérer ces miniatures

    - faire un lien vers les images en taille originale

___

### Utilisation
Donner le droit *« exécutable »* au fichier.
```
chmod +x galerie.sh
```

Exécuter le script.
```
./galerie.sh
```

___

### Error convert ?
Installer le paquet **ImageMagick** :
```
apt-get install imagemagick
```