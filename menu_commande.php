<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Commander des plats</title>
  <style>
    .plat { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
    .image-plat { width: 200px; height: auto; }
  </style>
</head>
<body>
  <h1>Menu</h1>
  <div id="menu"></div>
  <button onclick="envoyerCommande()">Commander</button>

  <script>
    let plats = [];
    let selections = {};

    // Récupère les plats depuis l'API
    fetch('http://localhost/eatsmart/api/getPlats.php')
      .then(response => response.json())
      .then(data => {
        plats = data;
        const menuDiv = document.getElementById('menu');
        data.forEach(plat => {
          selections[plat.id] = 0;

          const platDiv = document.createElement('div');
          platDiv.className = "plat";
          platDiv.innerHTML = `
            <h3>${plat.nom}</h3>
            <p>${plat.description}</p>
            <p><strong>${plat.prix} €</strong></p>
            <img src="${plat.image_url}" class="image-plat"><br>
            <label>Quantité :
              <input type="number" min="0" value="0" onchange="changerQuantite(${plat.id}, this.value)">
            </label>
          `;
          menuDiv.appendChild(platDiv);
        });
      });

    function changerQuantite(platId, quantite) {
      selections[platId] = parseInt(quantite);
    }

    function envoyerCommande() {
      const userId = 1; // Tu peux gérer ça avec une session ensuite
      const articles = [];

      for (const id in selections) {
        const qte = selections[id];
        if (qte > 0) {
          articles.push({ id: parseInt(id), quantite: qte });
        }
      }

      if (articles.length === 0) {
        alert("Veuillez sélectionner au moins un plat !");
        return;
      }

      fetch('http://localhost/eatsmart/api/commander.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ user_id: userId, articles })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          alert("Commande envoyée avec succès ! ID : " + data.commande_id);
        } else {
          alert("Erreur : " + data.error);
        }
      });
    }
  </script>
</body>
</html>
