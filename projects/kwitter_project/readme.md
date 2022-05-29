# Kwitter

Syftet med webbapplikationen är att uppfylla kraven som uppgiftsbeskrivningen som skolan gav i webbserverprogrammering 1 och webbutveckling 2. Webbappen ska låta användaren posta meddelanden och svara på olika meddelanden. Allt som krävs för att komma igång och använda kwitter är ett konto.

## För att få igång projektet lokalt

Om du vill ladda ned projektet så behöver du ett par saker. Nämnligen Laragon och en databashanterare. Du kan använda den som är i laragon redan för att importera SQL koden som finns i DB mappen. Använd adminer för att få en enklare överblick över databasens struktur.
Sedan kan du navigera till kwitter_project.test i browsern.

## Strukturen av programfilerna:
```
│   index.php
│   readme.md
│
├───db
│       adminer.sql
│       dbconn.php
│       heidisql.sql
│
├───js
│       canvas.js
│       like_functions.js
│
├───logic
│   │   ajax.php
│   │   functions.php
│   │   log.php
│   │   logic.php
│   │   reg.php
│   │
│   └───admin
│           adminlogic.php
│
├───pics
│       dove.png
│
├───sounds
│       merp.wav
│
├───style
│       stylesheet.css
│
└───visual
    │   footer.php
    │   header.php
    │   navbar.php
    │
    ├───pages
    │   │   flow.php
    │   │   information.php
    │   │   login.php
    │   │   postmsg.php
    │   │   register.php
    │   │   reply.php
    │   │   theirflow.php
    │   │
    │   └───admin
    │           admin.php
    │           updateform.php
    │
    └───partials
            leftpanel.php
            message.php
            replies.php
            rightpanel.php
            upload_post.php
            userinfo.php
```