#!/bin/bash

# 1. Vérification du premier paramètre exite ou non.
if [ -z $1 ]
then
    echo -e "Vous devez fournir en paramètre le nom du fichier \n(exemple : $0 dico.txt [param] )"
    exit 1
elif [ -e $1 ] && [ -f $1 ] && [ -r $1 ] # 2. Le fichier existe, est'il au bon format et accessible en lecture ?
then
    entree=$1

    # 3. Vérification second paramètre
    if [ -z $2 ]
    then
        param="sort -rn"
    else
        if [ $2 == 'inverse' ]
        then
            param="sort -n"
        elif [ $2 == 'save' ]
        then
            trie="sort -rn"
            save=">save.txt"
            param="$trie $save"
        else
            param="sort -rn"
        fi
    fi

    # 4. Génére les statisques sur l'utlisation d'une lettre sur un fichier donnée en entrée.
    grep -i [A-Z] $entree | sed -E s'/(.)/\1\n/g' | sort | uniq -c | $param

else
    echo "Un problème est survenue lors de l'ouverture du fichier."
    exit 1
fi