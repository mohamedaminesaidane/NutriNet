function validateForm() {
  var nom = document.getElementById("nom").value;
  var prixVente = document.getElementById("prixVente").value;
  var prixAchat = document.getElementById("prixAchat").value;
  var description = document.getElementById("description").value;
  var nombre = document.getElementById("nombre").value;

  // Vérifier si les champs obligatoires sont remplis
  if (nom === '' || prixVente === '' || prixAchat === '' || description === '' || nombre === '') {
    alert('Veuillez remplir tous les champs obligatoires.');
    return false;
  }

  // Vérifier la longueur du nom (entre 3 et 40 caractères)
  if (nom.length < 3 || nom.length > 40) {
    alert('Le nom doit avoir entre 3 et 40 caractères.');
    return false;
  }

  // Vérifier si les champs de prix sont de type float
  if (isNaN(parseFloat(prixVente)) || isNaN(parseFloat(prixAchat))) {
    alert('Les champs de prix doivent contenir des valeurs numériques.');
    return false;
  }

  // Vérifier la longueur de la description (entre 10 et 500 caractères)
  if (description.length < 10 || description.length > 500) {
    alert('La description doit avoir entre 10 et 500 caractères.');
    return false;
  }

  // Vérifier la quantité (entre 1 et 200)
  var nombreValue = parseInt(nombre);
  if (isNaN(nombreValue) || nombreValue < 1 || nombreValue > 200) {
    alert('La quantité doit être un nombre entre 1 et 200.');
    return false;
  }

  // If all validations pass, allow form submission
  return true;
}
