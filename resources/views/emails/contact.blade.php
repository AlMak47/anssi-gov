<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Prise de contact</h2>
    <p>Réception d'une prise de contact avec les éléments suivants :</p>
    <ul>
      <li><strong>Nom</strong> : {{$contact['nom']}}</li>
      <li><strong>Prenom</strong> : {{$contact['prenom']}}</li>
      <li><strong>Email</strong> : {{$contact['email']}}</li>
      <li><strong>Telephone</strong> : {{$contact['phone']}}</li>
      <li><strong>Message</strong> : <p>{{$contact['message']}}</p></li>
    </ul>
  </body>
</html>
