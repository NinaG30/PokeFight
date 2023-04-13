<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="views/assets/style.css" rel="stylesheet"> Fonctionne mal -->
    <title>Poké Fight</title>
</head>
<style>
    
@import url("https://fonts.googleapis.com/css2?family=Inter&family=Montserrat+Alternates&display=swap");

body {
  margin: 0;
  padding: 0;
  background: whitesmoke;
  font-family: "Montserrat Alternates", sans-serif;
  box-sizing: border-box;
}

header {

  background-image: url("https://zupimages.net/up/23/14/tuen.png");
  background-size: cover;
  background-position: bottom;
  height: 40vh;
  display: flex;
  align-items: center;
}

header div {
  width: 100%;
  color: white;
}

header div h1 {
  background: #19245cb3;
  padding: 5px;
  text-shadow: 1px 1px 2px black;
  font-size: 2.5em;
}

header div p {
  margin: 0 10px;
  width: 50%;
  background: #19245cb3;
  font-size: 0.8em;
  padding: 5px;
}



.flex {
  display: flex;
  height: 55vh;
  flex-wrap: wrap;
  justify-content: space-around;
  align-items: center;
}

footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  background: #19245c;
  padding: 5px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  font-size: 0.8em;
}

div img {
  width: 200px;
}

a,
button,
label {
  background: #19245c;
  color: white;
}
a {
  display: block;
  text-align: center;
  width: 200px;
  text-decoration: none;
  margin: 10px auto;
  padding: 10px;
  font-size: 0.8em;
  border-radius: 10px;
}

a:hover, button:hover {
  background: #aeb8ec;
  color: black;
}

form {
  background: #19245cb3;
  padding: 10px;
}

.crea_form {
    min-width:300px;
    width:40%;    
    margin:10px auto;
}

.crea_form form {
    text-align:center;
    color:white;
}

select {
  display: block;
}

label {
  display: block;
  margin: 5px 0;
  padding: 5px;
}

button {
  border: none;
  padding: 10px;
  margin: 10px 0;
  font-family: "Montserrat Alternates", sans-serif;
  border-radius: 10px;
  cursor: pointer;
}
.table {
   height:40vh; 
  display:flex;
  justify-content: center;
  align-items: center;
}

table {
  width:50%;
  
}

.table td{
  background:#19245cb3;
  color:white;
  padding: 5px;

}

@media screen and (max-width: 768px) {
  div img {
    display:block;
      margin:auto;
   
  }
  .flex {
      display: block;
  }
 

}
</style>
<body>
    <header>
        <div>
            <?php if (isset($_SESSION['id_joueur'])) { ?>
                <h1>Poké Fight : Bonjour
                    <?php echo $_SESSION['pseudo'] ?>
                </h1>
            <?php } else { ?>
                <h1>Bienvenue sur Poké Fight </h1>
            <?php } ?>
            <p>Tu es un fan de pokémon ? Alors n'attends plus et viens jouer !</p>
        
    </header>