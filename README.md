# Lab 9


## Q1

### a
```
R=(A,B,C,D)
F={
 AB ⇒ C,
 C ⇒ D,
 D ⇒ A
}
```

#### a

```
B can't be generated so B ⊆ K
	(B)+ = B

TEST (AB)+ ⇒ R True
(AB)+ = AB
	  = ABC
	  = ABCD

Test (A)+ ⊂ R True
	(A)+ = A
		 = AD
		 = ADC

Test (B)+ ⊂ R True
	(B)+ = B

==> {A, B} est une cles candidate.

d'apres F,
B doit etre present: figure seulement a gauche.

TEST (BC)+ ⇒ R True
(BC)+ = BC
	  = BCD
	  = ABCD

Test (C)+ ⊂ R True
	(C)+ = C
		 = CD
		 = ADC

Test (B)+ ⊂ R True
	(B)+ = B

==> {B, C} est une cles candidate.

TEST (BD)+ ⇒ R True
(BD)+ = BD
	  = ABD
	  = ABCD

Test (D)+ ⊂ R True
	(D)+ = D
		 = AD

Test (B)+ ⊂ R True
	(B)+ = B

==> {B, D} est une cles candidate.


TEST (ABC)+ ⇒ R False
mais (AB)+ ⇒ R

TEST (ABD)+ ⇒ R False
mais (AB)+ ⇒ R

TEST (BCD)+ ⇒ R False
mais (BC)+ ⇒ R
```

#### b

R est dans BCNF?
```
Non, C ⇒ D et C n'est pas supercles
```

R est dans 3NF?
```
OUI,

AB ⇒ C
C - AB = {C} ⊆ {B, C}

C ⇒ D
D - C = {D} ⊆ {B, D}

D ⇒ A
A - D = {A} ⊆ {A, B}
```


### b
```
R=(A,B,C,D)
F={
 A ⇒ B,
 B ⇒ C,
 C ⇒ D,
 D ⇒ A
}
```

#### a
```
(A)+ = ABCD
(B)+ = ABCD
(C)+ = ABCD
(D)+ = ABCD
A, B, C, D sont min K
```
#### b
```
A ⇒ B, A super key
B ⇒ C, B super key
C ⇒ D, C super key
D ⇒ A, D super key

R est BCNF tout α ⇒ β, α super key
R est BCNF alors R est 3NF
```

### c
```
S=(A,B,C,D)
F={
 B ⇒ C,
 C ⇒ A,
 C ⇒ D
}
```
#### a
```
B ne figure qu'a droite ==> B appartient a min K
(B)+ = B = BC = ABC = ABCD ⇒ R
donc B est min k (la seule)
```

#### b
```
C ⇒ A, C n'est pas super key
Donc R n'est pas BCNF

C ⇒ A, C n'appartient pas a min K (B)
Donc R n'est pas 3NF
```

### d
```
R=(A,B,C,D)
F={
 ABC ⇒ D,
 D ⇒ A
}
```
#### a
```
B et C ne figure qu'a gauche => min k contient B et C
(BC)+ = BC ⇒ R False
(ABC)+ = ABC = ABCD ⇒ R
(ABD)+ = ABD = ABCD ⇒ R
Donc les cles candidates sont ABC et ABD
```

#### b
```
D ⇒ A, D n'est pas super key
Donc R n'est pas BCNF


ABC ⇒ D, appartient a un min K (ABC)
D ⇒ A, appartient a un min K (ABD)

Donc R est 3NF
```

### e
```
R = (A,B,C,D)
F = {
 A ⇒ C,
 B ⇒ D
}
```
#### a
```
A et B ne figure qu'a gauche => min k contient A et B
(AB)+ = AB = ABC = ABCD ⇒ R True
Donc la cles candidat est AB
```

#### b
```
A ⇒ C, A n'est pas super key
B ⇒ D, B n'est pas super key
Donc R n'est pas BCNF


A ⇒ C, A appartient a un min K (AB)
B ⇒ D, B appartient a un min K (AB)
Donc R est 3NF
```

## Q2

### a
```
R=(A,B,C,D,E,F)
F={
 AB ⇒ C,
 BC ⇒ AD,
 D ⇒ E,
 CF ⇒ B
}

AB ⇒ C (F)
AB ⇒ B (regle reflexive)
AB ⇒ BC ⇒ AD (union, F)
AB ⇒ AD so AB ⇒ D and AB ⇒ D (decomposition)
==> AB ⇒ D valid
```

### b
```
R=(A,B,C)
F={
 AB ⇒ C
}
A ⇒ C Non valid
contre exemple:
R = (
	A: first_name,
	B: last_name,
	C: grade
	)
```
|A|B|C|
|--|--|--|
|'a'|'b'|0|
|'a'|'c'|1|
|'d'|'b'|2|
```
'a' ⇒ 0
'a' ⇒ 1
```
### c
```
R=(A,B,C)
F={
 AB ⇒ C
}
B ⇒ C Non valid
contre exemple:
R = (
	A: first_name,
	B: last_name,
	C: grade
	)
```
|A|B|C|
|--|--|--|
|'a'|'b'|0|
|'a'|'c'|1|
|'d'|'b'|2|
```
'b' ⇒ 0
'b' ⇒ 2
```

### d
```
R=(A,B,C)
F={
 AB ⇒ C
}

A ⇒ C OR B ⇒ C non valid
contre exemple:
R = (
	A: first_name,
	B: last_name,
	C: grade
	)
```
|A|B|C|
|--|--|--|
|'a'|'b'|0|
|'a'|'c'|1|
|'d'|'b'|2|
```
'a' ⇒ 0
'a' ⇒ 1
A ⇒ C False
ET
'b' ⇒ 0
'b' ⇒ 2
B ⇒ C False
```

## Q3
```
F={
 B ⇒ A,
 D ⇒ A,
 AB ⇒ D
}

Fc = F = { B ⇒ A, D ⇒ A, AB ⇒ D }
Fc = { B ⇒ A, D ⇒ A, AB ⇒ D } (on ne peut pas appliquer l'union)
Fc = { B ⇒ A, D ⇒ A, AB ⇒ D } (on reduit AB ⇒ D car B ⇒ A donc B ⇒ AB ⇒ D)
Fc = { B ⇒ A, D ⇒ A, B ⇒ D } 
Fc = { D ⇒ A, B ⇒ AD } (union)
Fc = { D ⇒ A, B ⇒ D } (on reduit B ⇒ AD) (Fc - {B ⇒ AD}) U {B ⇒ (AD - A)} = {D⇒A, B⇒D} U {B ⇒ D}
Fc = { 
	D ⇒ A, 
	B ⇒ D 
}
```

## Q4
```
R = ABCDEFGH
F = {
 ABH ⇒ C,
 A ⇒ DE,
 BGH ⇒ F,
 F ⇒ ADH,
 BH ⇒ GE
}

F+
∅+ = ∅ so ∅ ⇒ ∅
A+ = ADE
B+ = B
C+ = C
D+ = D
E+ = E
F+ = FADEH
G+ = G
H+ = H
AB+ = ABDE
AC+ = ACDE
AD+ = ADE
AE+ = ADE
AF+ = ADEFH
AG+ = ADEG
AH+ = ADEH
BC+ = BC
BD+ = BD
BE+ = BE
BF+ = ABCDEFHG
BG+ = BG
BH+ = BEG
CD+ = CD
CE+ = CE
CF+ = ACDEH
CG+ = CG
CH+ = CH
DE+ = DE
DF+ = ADEFH
DG+ = DG
DH+ = DH
EF+ = ADEFH
EG+ = EG
EH+ = EH
FG+ = ADEFHG
FH+ = ADEFH
GH+ = GH
...



result = {A, B, C, D, E, F, G, H}
done = false
F+ 
in R, A ⇒ DE mais A n'est pas K car B appartient a K




R = ABCDEFGH
F = {
 ABH ⇒ C,
 A ⇒ DE,
 BGH ⇒ F,
 F ⇒ ADH,
 BH ⇒ GE
}
B appartient a K,
BA+ = ABDE
BC+ = BC
BD+ = BD
BE+ = BE
BF+ = ABDH = ABCDEFGH => R
BG+ = BG
BH+ = ABCDEFGH => R
BG+ = BG

BF et BH dans K

BAC+ = ABCED
BAD+ = ABDE
BAE+ = ABED
BAG+ = ABDEG

BCD+ = BCD
BCE+ = BCE
BCG+ = BCG

BED+ = BED
BEG+ = BEG

BACD+ = ABCDE
BACE+ = ABCDE
BACG+ = ABCDEG

BAED+ = ABDE
BAEG+ = ABDEG

BCED+ = BCDE
BCEG+ = BCDE

BDEG+ = BDEG

==> BF et BH sont des min K

ABH ⇒ C,
A ⇒ DE,
BGH ⇒ F,
F ⇒ ADH,
BH ⇒ GE

BF
BH
```



