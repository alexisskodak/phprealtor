# PHP Realtors

Evaluation PHP

## Quelques notes:

##1. Structure de la BDD
###1.1 Table ```logement```
```
id:           INT AI INDEX PK
titre:        VARCHAR 100
adresse:      VARCHAR 100
ville:        VARCHAR 50
cp:           INT
surface:      SMALLINT
prix:         DOUBLE
photo:        VARCHAR 100
type:         VARCHAR 10
description:  TEXT
```
Note: un dump sql est disponible dans migrations, comprenant 6 lignes a titre d'exemple.