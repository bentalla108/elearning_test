<?php

$db_name ='mysql:host=localhost;port=3333;dbname=contact_db;';
$user_name='root';
$user_pwd ='';

$conn =new PDO($db_name ,$user_name ,$user_pwd);

if(isset($_POST['send']))
{
    $nom = $_POST['nom'];
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);

    $prenom = $_POST['prenom'];
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);

    $courses = $_POST['courses'];
    $courses = filter_var($courses, FILTER_SANITIZE_STRING);



    $commentaire = $_POST['commentaire'];
    $commentaire= filter_var($commentaire, FILTER_SANITIZE_STRING);

    $gender = $_POST['gender'];
    $gender = filter_var($gender, FILTER_SANITIZE_STRING);


    $select_contact =$conn ->prepare("SELECT * FROM `contact_form` 
    WHERE nom =? 
    AND prenom = ? 
    AND email = ?
    AND number = ?
    AND courses = ?
    AND commentaire = ? 
    AND gender = ? ") ;
    $select_contact -> execute([$nom, $prenom, $email, $number, $courses, $commentaire, $gender]);

    if($select_contact->rowCount() > 0)
    {

        $message[] ='Message déja envoyé ! ';
    }
    else{
        $insert_message = $conn -> prepare("INSERT INTO `contact_form`(nom, prenom , email, number, courses, commentaire, gender) VALUES (?,?,?,?,?,?,?)");

        $insert_message  -> execute([$nom, $prenom, $email, $number, $courses, $commentaire, $gender]);
        $message[] ='Message envoyé avec succés! ';
    };

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SAE FINAL Bentalla</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/style.css" rel="stylesheet" />

    <!-- Swipper Css -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Lien Awesome cdn font   -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- CSS Personalisé !!  -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- ----------------------------------------------------------------------- -->
    
    <?php 
if(isset($message)){
  foreach($message as $message){
    echo '
          <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
          </div>
    ';
  }
}
?>
    

    <!-- ----------------------------------------------------------------------- -->

    <!-- DEBUT NAV BAR SECTION -->
    <header class="header">
      <section class="flex">
        <a href="#home" class="logo">Bentalla.</a>

        <nav class="navbar">
          <a href="#home">Accueil</a>
          <a href="#about">A propos </a>
          <a href="#courses">Cours</a>
          <a href="#teachers">Formateurs</a>
          <a href="#reviews">Temoignages</a>
          <a href="#contact">Contact</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
      </section>
    </header>
    <!-- FIN  NAV BAR SECTION -->
    <!-- DEBUT PAGE D4ACCUEIL -->
    <section class="home" id="home">
      <div class="row">
        <div class="content">
          <h3>Online <span>Education</span></h3>
          <a href="#contact" class="btn">Contactez nous !!</a>
        </div>
        <div class="image">
          <img src="images/home_page_img.svg" alt="" />
        </div>
      </div>
    </section>

    <!-- FIN PAGE D4ACCUEIL -->

    <!-- DEBUT CONTEUR  -->
    <section class="count">
      <div class="box-container">
        <div class="box">
          <i class="fas fa-graduation-cap"> </i>
          <div class="content">
            <h3>100+</h3>
            <p>Cours</p>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-user-graduate"> </i>
          <div class="content">
            <h3>1500+</h3>
            <p>Eleves</p>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-chalkboard-user"> </i>
          <div class="content">
            <h3>50+</h3>
            <p>Formateurs</p>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-face-smile"> </i>
          <div class="content">
            <h3>100%</h3>
            <p>Satisfaction</p>
          </div>
        </div>
      </div>
    </section>

    <!-- FIN CONTEUR  -->
    <!-- DEBUT SECTION  A PROPOS  -->

    <section class="about" id="about">
      <div class="row">
        <div class="image"><img src="images\about-img.svg" alt="" /></div>
        <div class="content">
          <h3>Pourquoi nous choisir</h3>
          <p>
            Des formations 100% en ligne à domicile à suivre à votre propre
            rythme. 10 minutes par jour ?… ou 2 heures chaque week-end ? C’est
            vous qui choisissez où et quand suivre la formation ! Plusieurs
            dispositifs de financement sont possibles en fonction de votre
            statut professionnel et peuvent financer jusqu’à 100% votre
            formation. Nos formations sont notamment éligible au CPF.
          </p>

          <a href="#contact" class="btn">Contactez nous !!</a>
        </div>
      </div>
    </section>

    <!-- FIN SECTION  A PROPOS  -->

    <!-- DEBUT SECTION COURS -->
    <section class="courses" id="courses">
      <h1 class="heading">Nos <span>formations</span></h1>

      <div class="swiper course-slider">
        <div class="swiper-wrapper">
          <!-- -------------------------------------------------- -->
          <div class="swiper-slide slide">
            <img src="images/data_base.svg" alt="" />
            <h3>Apprendre et maitriser SQL</h3>
            <p>
              SQL, pour Structured Query Language, est un langage qui permet
              d'interroger une base de données relationnelle afin de pouvoir
              modifier ou récupérer des informations. Les bases de données
              relationnelles permettent de sauvegarder les informations sous
              forme de tableau à 2 dimensions.......
            </p>
          </div>
          <!-- ----------------------------- -->
          <div class="swiper-slide slide">
            <img src="images/python.svg" alt="" />
            <h3>Python</h3>
            <p>
              Python est un langage de programmation objet interprété,
              multi-paradigme et multiplateformes. Il favorise la programmation
              impérative structurée, fonctionnelle et orientée objet. Il est
              doté d'un typage dynamique fort, d'une gestion automatique de la
              mémoire par ramasse-miettes et d'un système de gestion
              d'exceptions
            </p>
          </div>
          <!-- ----------------------------- -->
          <div class="swiper-slide slide">
            <img src="images/course1.svg" alt="" />
            <h3>Conception 3D Tinkercad</h3>
            <p>
              La conception 3D est le processus qui consiste à créer, à l'aide
              d'un logiciel, une représentation mathématique d'un objet ou d'une
              forme en trois dimensions. L'objet créé est appelé modèle 3D et
              ces dessins en trois dimensions sont utilisés pour la conception
              générée par ordinateur (CGO).
            </p>
          </div>
          <!-- ----------------------------- -->
          <div class="swiper-slide slide">
            <img src="images/laravel.svg" alt="" />
            <h3>Découverte de Laravel 10</h3>
            <p>
              Laravel est un framework PHP qui vous permettra d'écrire une
              application web plus rapidement et plus proprement.
            </p>
          </div>
          <!-- ----------------------------- -->
          <div class="swiper-slide slide">
            <img src="images/wordpress.svg" alt="" />
            <h3>Découverte de WordPress</h3>
            <p>
              WordPress est un CMS (système de gestion de contenu), qui vous
              permettra de créer un site web sur lequel vous pourrez gérer vos
              contenus de manière autonome avec une interface visuelle simple.
            </p>
          </div>
          <!-- ----------------------------- -->
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- FIN SECTION COURS -->

    <!-- DEBUT SECTION PROFESSEURS -->
    <section class="teachers" id="teachers">
      <h1 class="heading">
        <span>Nos </span> Formateurs <span>Expérimentés</span>
      </h1>
      <div class="swiper teachers-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <img src="images/bentalla.JPG" alt="" />
            <div class="share">
              <a href="" class="fab fa-facebook-f"></a>
              <a href="" class="fab fa-twitter"></a>
              <a href="" class="fab fa-linkedin"></a>
              <a href="" class="fab fa-instagram"></a>
            </div>
            <h3>Mor Talla Mbaye</h3>
          </div>
          <div class="swiper-slide slide">
            <img src="images/professeur1.jpg" alt="" />
            <div class="share">
              <a href="" class="fab fa-facebook-f"></a>
              <a href="" class="fab fa-twitter"></a>
              <a href="" class="fab fa-linkedin"></a>
              <a href="" class="fab fa-instagram"></a>
            </div>
            <h3>Sane Madio</h3>
          </div>
          <div class="swiper-slide slide">
            <img src="images/professeur2.jpg" alt="" />
            <div class="share">
              <a href="" class="fab fa-facebook-f"></a>
              <a href="" class="fab fa-twitter"></a>
              <a href="" class="fab fa-linkedin"></a>
              <a href="" class="fab fa-instagram"></a>
            </div>
            <h3>Mohamed</h3>
          </div>
          <div class="swiper-slide slide">
            <img src="images/professeur4.jpg" alt="" />
            <div class="share">
              <a href="" class="fab fa-facebook-f"></a>
              <a href="" class="fab fa-twitter"></a>
              <a href="" class="fab fa-linkedin"></a>
              <a href="" class="fab fa-instagram"></a>
            </div>
            <h3>Ouafa</h3>
          </div>
          <div class="swiper-slide slide">
            <img src="images/professeur3.jpg" alt="" />
            <div class="share">
              <a href="" class="fab fa-facebook-f"></a>
              <a href="" class="fab fa-twitter"></a>
              <a href="" class="fab fa-linkedin"></a>
              <a href="" class="fab fa-instagram"></a>
            </div>
            <h3>Sadio Mane</h3>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- FIN SECTION PROFESSEURS -->

    <!-- DEBUT REVIEWS SECTION -->
    <section class="reviews" id="reviews">
      <h1 class="heading"><span>Témoignages</span> des Etudiants</h1>

      <div class="swiper reviews-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <p>
              C'était un parcours incroyable, et le formateur a réussi à garder
              le parcours si engageant que tout semble tellement amusant tout au
              long du parcours. Je lui suis très reconnaissant d'avoir créé une
              pièce aussi étonnante qui a rendu le développement Web si amusant.
            </p>

            <div class="user">
              <img src="images/eleve1.svg" alt="" />
              <div class="user-info">
                <h3>Alberto De La Fuente</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide slide">
            <p>
              Je suis bientôt à la fin de la formation mais je ne pouvais plus
              retenir la joie qui m'anime en ce moment... Après avoir suivi 3
              formations différentes, je peux affirmer que cette formation est
              la meilleure que j'ai pu suivre!! J'ai pu comprendre certaines
              notions que je comprenais moins et j'ai appris d'autres notions
              que je ne connaissais pas du tout, le formateur explique bien. En
              une phrase "FORMATION INCROYABLISSIME". Je conseille cette
              formation à 100%, vous ne serez vraiment pas déçu!!
            </p>

            <div class="user">
              <img src="images/eleve2.svg" alt="" />
              <div class="user-info">
                <h3>Abdoulaye Kama</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide slide">
            <p>
              Cours super et formateur au top, idéal pour apprendre Python et
              Django. Pas mal de problèmes pour les utilisateurs Windows sur la
              partie PostGresQL. La partie déploiement est top, et permet de
              réviser des choses apprises. Tout est expliqué de façon très
              détaillée et permet d'acquérir de très solides bases pour Django.
              Une base parfaite pour ensuite partir sur des cours plus avancés
              sur Rest Framework, la création de grosses API avec Docker, etc.
            </p>

            <div class="user">
              <img src="images/eleve3.svg" alt="" />
              <div class="user-info">
                <h3>Jose Mourinho</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide slide">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
              eius tempore assumenda eligendi fuga iusto ut ratione sint dolorum
              adipisci, quisquam dolore obcaecati unde, odio ipsa similique
              ipsum suscipit nostrum.
            </p>

            <div class="user">
              <img src="images/eleve4.svg" alt="" />
              <div class="user-info">
                <h3>Eleve 4 en TES</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide slide">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus
              eius tempore assumenda eligendi fuga iusto ut ratione sint dolorum
              adipisci, quisquam dolore obcaecati unde, odio ipsa similique
              ipsum suscipit nostrum.
            </p>

            <div class="user">
              <img src="images/eleve5.svg" alt="" />
              <div class="user-info">
                <h3>Eleve 5 en TES</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- FIN  REVIEWS SECTION -->

    <!-- DEBUT CONTACT SECTION -->

    <section class="contact" id="contact">
      <h1 class="heading"><span>Contact</span></h1>
      <div class="row">
        <div class="image">
          <img src="images/contact.svg" alt="" />
        </div>
        <form action="" method="post">
          <span>Prénom</span>
          <input
            type="text"
            required
            placeholder="Entrez votre Prénom"
            maxlength="40"
            name="prenom"
            class="box" />
          <span>Nom</span>
          <input
            type="text"
            required
            placeholder="Entrez votre nom "
            maxlength="40"
            name="nom"
            class="box" />

          <span>Email</span>
          <input
            type="email"
            required
            placeholder="Entrez votre email"
            maxlength="40"
            name="email"
            class="box" />

          <span>Tel</span>
          <input
            type="number"
            required
            placeholder="Entrez numero tel"
            max="9999999999"
            min="0"
            name="number"
            class="box"
            onkeypress="if(this.value.length ==10) return false;" />
          <select name="courses" class="box">
            <option value="" disabled selected>Selectionnez un cour--</option>
            <option value="Cour 1">Apprendre et maitriser SQL</option>
            <option value="Cour 2">Python</option>
            <option value="Cour 3">Conception 3D Tinkercad</option>
            <option value="Cour 4">Découverte de Laravel 10</option>
            <option value="Cour 5">Découverte de WordPress</option>
          </select>
          <span>Commentaire</span>
          <textarea
            class="box"
            rows="6"
            cols="30"
            name="commentaire"
            placeholder="Laissez votre message"></textarea>
          <span>Titre</span>
          <div class="radio">
            <input type="radio" name="gender" value="Mr" id="male" />
            <label for="male">Mr</label>
            <input type="radio" name="gender" value="Mme" id="female" />
            <label for="female">Mme</label>
          </div>
          <input
            type="submit"
            value="Envoyez votre message"
            class="btn"
            name="send" />
        </form>
      </div>
    </section>

    <!-- FIN CONTACT SECTION-->

    <!-- FOOTER SECTION -->
    <footer class="footer">
      <section>
        <div class="share">
          <a href="" class="fab fa-facebook-f"></a>
          <a href="" class="fab fa-twitter"></a>
          <a href="" class="fab fa-linkedin"></a>
          <a href="" class="fab fa-instagram"></a>
          <a href="" class="fab fa-youtube"></a>
        </div>
        <div class="credit">
          &copy; Copyright @ 2023 <span>Mor Talla Mbaye</span> || Tous Droits
          Réservés
        </div>
      </section>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- js personalisé !!!  -->
    <script src="js/script.js"></script>
  </body>
</html>
