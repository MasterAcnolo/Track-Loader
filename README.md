# Track Loader

### Endpoints API disponibles

- `GET /api/status` — Vérifie le statut de l’API

### Endpoints Genres & Artistes

- `GET /api/genres` — Liste tous les genres musicaux
- `GET /api/artist` — Liste des artistes

### Endpoints Albums

- `GET /api/albums` — Liste tous les albums
- `GET /api/albums/:ID` — Détail d’un album par son ID
- `GET /api/albums/trending` — Liste des albums en tendance

#### Endpoints Albums Filtré

- `GET /api/albums?name=XXX` — Liste les albums filtrés par nom (Recherche Inexacte Accepté)
- `GET /api/albums?genre=GENRE` — Liste les albums filtrés par genre
- `GET /api/albums?annee=ANNEE` — Albums filtrés par année (ex : 2020)
- `GET /api/albums?artiste=ARTISTE` — Albums filtrés par artiste (Recherche Inexacte Accepté)
- `GET /api/albums?genre=GENRE&annee=ANNEE&artiste=ARTISTE` — Tous les filtres combinables

### Endpoints Recherche

- `GET /api/search?q=QUERY` — Recherche globale (nom ou artiste)

### Endpoints Utilisateur

- `POST /api/user/login` — Connexion utilisateur
- `POST /api/user/register` — Inscription utilisateur
- `GET /api/user/logout` — Déconnexion

### Endpoints Panier

- `GET /api/panier` — Récupère le panier de l’utilisateur
- `POST /api/panier/:ID` — Ajoute un album au panier
- `DELETE /api/panier/:ID` — Retire un album du panier
- `POST /api/panier/checkout` — Valide le panier (checkout)

### Endpoint Historique

- `GET /api/historique` — Récupère l’historique d’achats