# Track Loader

## Endpoints API disponibles

- `GET /api/status` — Vérifie le statut de l’API

- `GET /api/genres` — Liste tous les genres musicaux

- `GET /api/albums` — Liste tous les albums
- `GET /api/albums/:ID` — Détail d’un album par son ID

- `GET /api/albums?name=XXX` — Liste les albums filtrés par nom (Recherche Inexacte Accepté)
- `GET /api/albums?genre=GENRE` — Liste les albums filtrés par genre
- `GET /api/albums?annee=ANNEE` — Albums filtrés par année (ex : 2020)
- `GET /api/albums?artiste=ARTISTE` — Albums filtrés par artiste (recherche partielle)
- `GET /api/albums?genre=GENRE&annee=ANNEE&artiste=ARTISTE` — Tous les filtres combinables

- `GET /api/albums/trending` — Liste des albums en tendance

- `GET /api/search?q=QUERY` — Recherche globale (nom ou artiste)

- `POST /api/user/login` — Connexion utilisateur
- `POST /api/user/register` — Inscription utilisateur
- `GET /api/user/logout` — Déconnexion