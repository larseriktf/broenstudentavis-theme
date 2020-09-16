# Broenstudentavis

## Arbeidsflyt
- Arbeidsoppgaver ligger under Issues og Project
- For hver Issue lages en ny branch i git kalt 'Problem-[Issue nummer]', for eksempel *Problem-15*
- Når arbeidet i branch er ferdig, merge til develop branchen.

Det er viktig at man aldri jobber direkte i Master branchen, siden det er der nettsiden henter koden fra!

## Opprette nytt arbeidsmiljø
# Programvare
- Git Bash (Git)
- Local By Flywheel

# Prosess
1. Last ned *broen-temlate.zip* fra Google Drive
2. Dra filen inn i Local By Flywheel, gi det et navn og velg "Preferred" på innstillingen
3. Åpne filstien til den nyopprettede lokale nettsiden
    - Høyreklikk på nettsidenavnet i sidekolonnen og velg "Show Folder"
    - Klikk deg inn på mappen og videre -> app/public/wp-content/themes/twentytwenty-child
4. Høyreklikk mappen åpne *Git Bash*
5. Skriv følgende kommandoer i Git Bash:
    git init
    git remote add origin https://github.com/42-Broenstudentavis/broenstudentavis-theme.git
    git fetch --all
    git pull --all
6. Lag en ny branch for den issuen som jobbes med:
    git checkout -e problem-*Issue nummer*

## Opplasting til GitHub
1. Åpne Git Bash i mappevinduet
2. Skriv følgende kommandoer
    git add .
    git commit -m "*Din melding*"
    git push origin *branch-navn*