A Jekyll-website and a repository containing all research results about
the German composer August Högn (1978-1961).

The main location of the website is at http://august-hoegn.tk. A mirror
of the site is located at http://josef-friedrich.github.io/august-hoegn.

To compile the Jekyll based website install docker and run:

```
./jekyll.sh

```

# Collections

* archives (Dokumente)
* compostions (Kompositionen)
* correspondence (Korrespondenz)
* historical_works (Heimatkundliche Werke)
* interviews (Interviews)
* photos (Fotos)

# Data files

* arrangements (Arrangements)
* guestbook (Gästebuch)
* receptions (Rezepierte Werke)
* thanks (Dank)

# Folder structure

```
├ life
│ ├ biography (Kurzbiographie)
│ ├ personal-data-sheet (Tabellarischer Lebenslauf)
│ └ photos (Fotos)
│   ├ hoegn (Fotos mit August Högn)
│   │ ├ portrait (Portrait-Fotos)
│   │ ├ group (Gruppen-Fotos)
│   │ └ relatives (Verwandte)
│   ├ historical (Historische Fotos)
│   │ ├ church (Pfarrkirche)
│   │ ├ school (Volksschule)
│   │ └ ruhmannsfelden (Ruhmannsfelden)
│   └ today (Aktuelle Fotos)
│     └ gravesite (Grabstätten)
│
├ works
│ ├ compositions (Kompositionen)
│ │ ├ recordings (Aufnahmen)
│ │ ├ find-spot (Fundorte)
│ │ ├ arrangements (Arrangements)
│ │ └ receptions (Rezipierte Werke)
│ └ historical-works (Heimatkundliche Werke)
│
└ project
  ├ exploration (Forschung)
  │ ├ documents (Dokumente)
  │ │ └ find-spot (Fundorte)
  │ ├ interviews (Interviews)
  │ └ correspondence (Korrespondenz)
  ├ publications (Publikationen)
  │ ├ approval-work (Zulassungsarbeit)
  │ ├ book-mozart (Buch „Der Mozart von Ruhmannsfelden“)
  │ ├ score-missa-josephi (Noten „Josephi-Messe“)
  │ └ copies (Kopien in geringer Stückzahl)
  │   ├ compositions (Kompositionen)
  │   ├ historical-works (Heimatkundliche Werke)
  │   └ manuscripts (Faksimilieausgabe der Manuskripte)
  └ background (Hintergrund)
    ├ website (Über diese Website)
    │ ├ table-of-contents (Inhaltsverzeichnis)
    │ ├ links (Linksammlung)
    │ ├ guestbook (Gästebuch)
    │ ├ imprint (Impressum)
    │ └ contact (Kontakt)
    └ thanks (Dank)
```

# To do:

* [ ] Link musescore files
* [ ] Link recordings
* [ ] Fill empty landing pages with content
  * /life/
  * /project/exploration/
  * /project/publications/
  * /project/background/
* [ ] LaTeX conversion "Der Mozart von Ruhmannsfelden"
* [ ] LaTeX conversion "Zulassungsarbeit"
* [ ] Integrate "Über den Bergen" into compositions
