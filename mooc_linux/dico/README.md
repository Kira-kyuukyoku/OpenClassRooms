# Activité Mooc Linux d'OpenClassRooms.
___

## Exercie
Effectuez des statistiques à l'aide d'un script Bash.

Le script doit fournir des **statistiques sur l'utilisation des lettres dans une langue**.

Que fait réellement le script :

    * affiche le nombre de fois que chaque lettre est utilisée

    * vérifie la présence du paramètre indiquant le nom du fichier dictionnaire à utiliser

    - vérifie que le dictionnaire existe bel et bien

    * vérifie la présence du second paramètres et adapte le résultat final

___

### Utilisation
Donner le droit *« exécutable »* au fichier.
```
chmod +x langstat.sh
```

Exécuter le script.
```
./langstat.sh dico.txt
```

___

### Optimisation possible

    * Ignorer les espaces et tirets.
    * Ajouter de nouveaux paramètres.
