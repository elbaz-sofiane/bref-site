<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <meta name="description" content="Bref Barber Shop — Barbier artisan à Paris. Coupes, dégradés, rasage. Prenez rendez-vous en ligne." />
  <meta name="theme-color" content="#0d0d0d" />
  <!-- Open Graph -->
  <meta property="og:title" content="Bref Barber Shop — Paris" />
  <meta property="og:description" content="Barbier artisan au cœur de Paris. L'essentiel. Rien de plus." />
  <meta property="og:type" content="website" />
  <link rel="icon" href="https://i.postimg.cc/Qxvm6L9M/icon.jpg">
  <title>Bref Barber Shop — Paris</title>

  <!-- Preconnect for Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />

  <!-- Stylesheet -->
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <!-- Skip to main content (accessibility) -->
  <a class="skip-link" href="#main">Aller au contenu</a>

  <!-- ══════════════════════════════════════════════════════════
       NAVIGATION
       ══════════════════════════════════════════════════════════ -->
  <nav id="nav" class="nav" role="navigation" aria-label="Navigation principale">
    <a href="#hero" class="nav__logo" aria-label="Bref Barber Shop – accueil">Bref.</a>

    <ul class="nav__links" role="list">
      <li><a href="#tarifs">Tarifs</a></li>
      <li><a href="#galerie">Galerie</a></li>
      <li>
        <a href="https://www.planity.com/bref-barbershop-75008-paris" target="_blank" rel="noopener noreferrer" class="nav__rdv">
          Rendez-vous
        </a>
      </li>
    </ul>

    <button
      class="nav__burger"
      id="burger"
      aria-label="Ouvrir le menu"
      aria-expanded="false"
      aria-controls="mobMenu"
    >
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </button>
  </nav>

  <!-- ══════════════════════════════════════════════════════════
       MOBILE MENU
       ══════════════════════════════════════════════════════════ -->
  <div class="mob-menu" id="mobMenu" role="dialog" aria-modal="true" aria-label="Menu navigation">
    <a href="#tarifs"  class="mob-menu__link">Tarifs</a>
    <a href="#galerie" class="mob-menu__link">Galerie</a>
    <a
      href="https://www.planity.com/bref-barbershop-75008-paris"
      target="_blank"
      rel="noopener noreferrer"
      class="mob-menu__link mob-menu__link--gold"
    >
      Rendez-vous
    </a>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       MAIN CONTENT
       ══════════════════════════════════════════════════════════ -->
  <main id="main">

    <!-- ── HERO ──────────────────────────────────────────────── -->
    <section id="hero" aria-label="Accueil">
      <p class="hero__tag">Paris · Barbier Artisan</p>

      <h1 class="hero__title">
        Bref
        <em>Barber</em>
      </h1>

      <p class="hero__sub">"La vie est belle si tes contours sont faits"</p>

      <div class="hero__btns">
        <a
          href="https://www.planity.com/bref-barbershop-75008-paris"
          target="_blank"
          rel="noopener noreferrer"
          class="btn btn--gold"
        >
          Prendre rendez-vous
        </a>
        <a href="#tarifs" class="btn btn--ghost">Voir les tarifs</a>
      </div>


    </section>

    <!-- ── TARIFS ─────────────────────────────────────────────── -->
    <section id="tarifs" aria-labelledby="tarifs-title">
      <div class="tarifs__head reveal">
        <div>
          <span class="s-label">Prestations</span>
          <h2 class="s-title" id="tarifs-title">Grille <em>tarifaire</em></h2>
        </div>
        <p class="tarifs__note">
          Tous nos soins incluent une consultation et des conseils d'entretien personnalisés.
        </p>
      </div>

      <!-- ── Grille de cards ──────────────────────────────────── -->
      <ul class="tarifs-grid reveal" aria-label="Grille tarifaire des prestations">

        <li class="tcard">
          <div class="tcard__inner">
            <span class="tcard__dur">30 min</span>
            <h3 class="tcard__name">La Coupe</h3>
            <p class="tcard__desc">Ciseaux ou tondeuse, finitions rasoir. Net et naturel.</p>
          </div>
          <div class="tcard__footer">
            <span class="tcard__price"><sup>€</sup>25</span>
          </div>
        </li>

        <li class="tcard">
          <div class="tcard__inner">
            <span class="tcard__dur">35 min</span>
            <h3 class="tcard__name">Le Dégradé</h3>
            <p class="tcard__desc">Dégradé précis, nuque tondeuse, finitions ciselées.</p>
          </div>
          <div class="tcard__footer">
            <span class="tcard__price"><sup>€</sup>28</span>
          </div>
        </li>

        <li class="tcard">
          <div class="tcard__inner">
            <span class="tcard__dur">25 min</span>
            <h3 class="tcard__name">La Barbe</h3>
            <p class="tcard__desc">Taille, contours et finitions rasoir droit. Serviette chaude.</p>
          </div>
          <div class="tcard__footer">
            <span class="tcard__price"><sup>€</sup>20</span>
          </div>
        </li>

        <li class="tcard tcard--featured">
          <span class="tcard__badge">Populaire</span>
          <div class="tcard__inner">
            <span class="tcard__dur">50 min</span>
            <h3 class="tcard__name">Coupe + Barbe</h3>
            <p class="tcard__desc">Le combo signature — coupe complète et barbe sculptée.</p>
          </div>
          <div class="tcard__footer">
            <span class="tcard__price"><sup>€</sup>40</span>
          </div>
        </li>

        <li class="tcard">
          <div class="tcard__inner">
            <span class="tcard__dur">40 min</span>
            <h3 class="tcard__name">Rasage Traditionnel</h3>
            <p class="tcard__desc">Rasoir droit, mousse chaude, serviette, soin après-rasage.</p>
          </div>
          <div class="tcard__footer">
            <span class="tcard__price"><sup>€</sup>35</span>
          </div>
        </li>

        <li class="tcard tcard--premium">
          <div class="tcard__inner">
            <span class="tcard__dur">75 min</span>
            <h3 class="tcard__name">Forfait Premium</h3>
            <p class="tcard__desc">Coupe, barbe, rasage crâne, soin hydratant. Tout compris.</p>
          </div>
          <div class="tcard__footer">
            <span class="tcard__price"><sup>€</sup>60</span>
          </div>
        </li>

      </ul>

      <!-- ── Desktop : tableau (caché, conservé pour SEO) ──────── -->
      <table class="price-table price-table--desktop reveal" aria-hidden="true" style="display:none">
        <colgroup>
          <col style="width: 28%" />
          <col />
          <col class="col-dur" style="width: 90px" />
          <col style="width: 90px" />
        </colgroup>
        <thead>
          <tr>
            <th scope="col">Prestation</th>
            <th scope="col">Détail</th>
            <th scope="col" class="th-dur">Durée</th>
            <th scope="col" style="text-align: right">Prix</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><div class="td-name">La Coupe</div></td>
            <td class="td-desc">Ciseaux ou tondeuse, finitions rasoir. Net et naturel.</td>
            <td class="td-dur">30 min</td>
            <td class="td-price"><sup>€</sup>25</td>
          </tr>
          <tr>
            <td><div class="td-name">Le Dégradé</div></td>
            <td class="td-desc">Dégradé précis, nuque tondeuse, finitions ciselées.</td>
            <td class="td-dur">35 min</td>
            <td class="td-price"><sup>€</sup>28</td>
          </tr>
          <tr>
            <td><div class="td-name">La Barbe</div></td>
            <td class="td-desc">Taille, contours et finitions rasoir droit. Serviette chaude.</td>
            <td class="td-dur">25 min</td>
            <td class="td-price"><sup>€</sup>20</td>
          </tr>
          <tr class="is-featured">
            <td>
              <div class="td-name">Coupe + Barbe <span class="td-badge">Populaire</span></div>
            </td>
            <td class="td-desc">Le combo signature — coupe complète et barbe sculptée.</td>
            <td class="td-dur">50 min</td>
            <td class="td-price"><sup>€</sup>40</td>
          </tr>
          <tr>
            <td><div class="td-name">Rasage Traditionnel</div></td>
            <td class="td-desc">Rasoir droit, mousse chaude, serviette, soin après-rasage.</td>
            <td class="td-dur">40 min</td>
            <td class="td-price"><sup>€</sup>35</td>
          </tr>
          <tr>
            <td>
              <div class="td-name">Forfait Premium</div>
            </td>
            <td class="td-desc">Coupe, barbe, rasage crâne, soin hydratant. Tout compris.</td>
            <td class="td-dur">75 min</td>
            <td class="td-price"><sup>€</sup>60</td>
          </tr>
        </tbody>
      </table>

      <!-- ── Mobile : cards ──────────────────────────────────── -->
      <ul class="price-cards price-cards--mobile reveal" aria-label="Grille tarifaire des prestations">

        <li class="price-card">
          <div class="price-card__top">
            <span class="price-card__name">La Coupe</span>
            <span class="price-card__price"><sup>€</sup>25</span>
          </div>
          <p class="price-card__desc">Ciseaux ou tondeuse, finitions rasoir. Net et naturel.</p>
          <span class="price-card__dur">⏱ 30 min</span>
        </li>

        <li class="price-card">
          <div class="price-card__top">
            <span class="price-card__name">Le Dégradé</span>
            <span class="price-card__price"><sup>€</sup>28</span>
          </div>
          <p class="price-card__desc">Dégradé précis, nuque tondeuse, finitions ciselées.</p>
          <span class="price-card__dur">⏱ 35 min</span>
        </li>

        <li class="price-card">
          <div class="price-card__top">
            <span class="price-card__name">La Barbe</span>
            <span class="price-card__price"><sup>€</sup>20</span>
          </div>
          <p class="price-card__desc">Taille, contours et finitions rasoir droit. Serviette chaude.</p>
          <span class="price-card__dur">⏱ 25 min</span>
        </li>

        <li class="price-card price-card--featured">
          <div class="price-card__top">
            <span class="price-card__name">
              Coupe + Barbe
              <span class="td-badge">Populaire</span>
            </span>
            <span class="price-card__price"><sup>€</sup>40</span>
          </div>
          <p class="price-card__desc">Le combo signature — coupe complète et barbe sculptée.</p>
          <span class="price-card__dur">⏱ 50 min</span>
        </li>

        <li class="price-card">
          <div class="price-card__top">
            <span class="price-card__name">Rasage Traditionnel</span>
            <span class="price-card__price"><sup>€</sup>35</span>
          </div>
          <p class="price-card__desc">Rasoir droit, mousse chaude, serviette, soin après-rasage.</p>
          <span class="price-card__dur">⏱ 40 min</span>
        </li>

        <li class="price-card">
          <div class="price-card__top">
            <span class="price-card__name">Forfait Premium</span>
            <span class="price-card__price"><sup>€</sup>60</span>
          </div>
          <p class="price-card__desc">Coupe, barbe, rasage crâne, soin hydratant. Tout compris.</p>
          <span class="price-card__dur">⏱ 75 min</span>
        </li>

      </ul>

      <div class="table-cta reveal" data-delay="2">
        <a
          href="https://www.planity.com/bref-barbershop-75008-paris"
          target="_blank"
          rel="noopener noreferrer"
          class="btn btn--gold"
        >
          Prendre rendez-vous
        </a>
      </div>
    </section>

    <!-- ── GALERIE ────────────────────────────────────────────── -->
    <section id="galerie" aria-labelledby="galerie-title">
      <div class="galerie__header reveal">
        <span class="s-label">Réalisations</span>
        <h2 class="s-title" id="galerie-title">La <em>galerie</em></h2>
      </div>

      <div class="gal-grid reveal" data-delay="1" role="list">

        <div class="gal-item" role="listitem" aria-label="Photo 6 — réalisation">
          <div class="gal-placeholder" aria-hidden="true">
            <img src="https://scontent-mrs2-2.cdninstagram.com/v/t51.71878-15/587556165_1553039936117934_5891031297898008848_n.jpg?stp=dst-jpg_e15_tt6&_nc_cat=106&ig_cache_key=Mzc3NDYyMDc5NjU0ODA2NzAxOQ%3D%3D.3-ccb7-5&ccb=7-5&_nc_sid=58cdad&efg=eyJ2ZW5jb2RlX3RhZyI6InhwaWRzLjY0MHgxMTM2LnNkci5DMyJ9&_nc_ohc=GvfrAOhr1noQ7kNvwE3wPp7&_nc_oc=AdnaAP11j8QVS0t6X-7IGqK1aiwq8bJr8u8Xsb9ATzKMIeO-EYTIEm3LaGSBR527yQCJ7H-leV45Y1SIJdKSR5Hz&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=scontent-mrs2-2.cdninstagram.com&_nc_gid=Xg_sag1M1JqQKg17NQIuCw&_nc_ss=8&oh=00_AftYGoW4Z0N_oSyJEUxv_FyQfT67cg6wEeAw5palnymLyQ&oe=69AA6B81" alt="photo1">
          </div>
        </div>

        <div class="gal-item" role="listitem" aria-label="Photo 2 — réalisation">
          <div class="gal-placeholder" aria-hidden="true">
            <img src="https://scontent-mrs2-2.cdninstagram.com/v/t51.75761-15/485615636_18051289133231465_849635060551545451_n.jpg?stp=dst-jpegr_e35_p1080x1080_tt6&_nc_cat=107&ig_cache_key=MzU5MzIwMDI2ODM4NjkzMDE1Mg%3D%3D.3-ccb7-5&ccb=7-5&_nc_sid=58cdad&efg=eyJ2ZW5jb2RlX3RhZyI6InhwaWRzLjE0NDB4MTgwMC5oZHIuQzMifQ%3D%3D&_nc_ohc=jz8jxDF4OtcQ7kNvwFsrefH&_nc_oc=Adki8uDCrIo18CR0jzY7ffXEnED1bk5W1bodKsc-3XilXCOW27j2sWy-g22QZtwfOntSJvRi6btcOIRLCMe0cLeh&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&se=-1&_nc_ht=scontent-mrs2-2.cdninstagram.com&_nc_gid=7rDKnlMEDMPJp-gON0u5RA&_nc_ss=8&oh=00_Afth8ew4PAojL1gR-TOEe3sMVS4HoGJyMlj88rk6rQMfXA&oe=69AA6D42" alt="photo2">

          </div>
        </div>

        <div class="gal-item" role="listitem" aria-label="Photo 3 — réalisation">
          <div class="gal-placeholder" aria-hidden="true">
            <img src="https://scontent-mrs2-2.cdninstagram.com/v/t51.82787-15/579989340_18073466201231465_3979489989352940149_n.jpg?stp=dst-jpegr_e35_tt6&_nc_cat=107&ig_cache_key=Mzc2MjMwOTcyNDc5NzQxODM0MA%3D%3D.3-ccb7-5&ccb=7-5&_nc_sid=58cdad&efg=eyJ2ZW5jb2RlX3RhZyI6InhwaWRzLjE0NDB4MTQ0MC5oZHIuQzMifQ%3D%3D&_nc_ohc=49_S7bQU-s0Q7kNvwGLdnqW&_nc_oc=AdleefY39tq3c7ZjMmbPvQoQl2f0E7RU51FAXdCojp5ZcHTYmLsr7zkLYMH90B7GHKdyOKoHjvwL2kXI2YdnMXLD&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&se=-1&_nc_ht=scontent-mrs2-2.cdninstagram.com&_nc_gid=Xg_sag1M1JqQKg17NQIuCw&_nc_ss=8&oh=00_Afvsk6ahkmqiJSxbdnndRxeAGDNwmYZ5fRcp8N7eS70HDg&oe=69AA6D2F" alt="photo3">
          </div>
        </div>


      </div>
    </section>

    <!-- ── CTA BAND ──────────────────────────────────────────── -->
    <div id="cta" role="complementary" aria-label="Prise de rendez-vous">
      <div class="cta__text">
        <span class="cta__lbl">Prêt ?</span>
        <h2 class="cta__title">
          Réservez votre séance<em> dès maintenant</em>
        </h2>
      </div>
      <a
        href="https://www.planity.com/bref-barbershop-75008-paris"
        target="_blank"
        rel="noopener noreferrer"
        class="btn--dark"
      >
        Prendre rendez-vous →
      </a>
    </div>

  </main>

  <!-- ══════════════════════════════════════════════════════════
       FOOTER
       ══════════════════════════════════════════════════════════ -->
  <footer role="contentinfo">
    <div class="foot-grid">

      <!-- About -->
      <div>
        <span class="foot__logo">Bref</span>
        <p class="foot__about">
          Barbier artisan au cœur de Paris. Précision, discrétion, savoir-faire — depuis plus de 10 ans.
        </p>
        <address class="foot__addr" style="font-style: normal;">
          <div>12 Rue de Moscou, 75008 Paris</div>
          <div>
            <a href="tel:+33983465524" style="color: inherit; text-decoration: none;">09 83 46 55 24</a>
          </div>
          <div>
            <a href="mailto:contact@bref-barbershop.fr" style="color: inherit; text-decoration: none;">contact@bref-barber.fr</a>
          </div>
        </address>
      </div>

      <!-- Links -->
      <div class="foot-col">
        <h4>Liens</h4>
        <a href="#tarifs">Tarifs</a>
        <a href="#galerie">Galerie</a>
        <a href="https://www.planity.com/bref-barbershop-75008-paris" target="_blank" rel="noopener noreferrer">Rendez-vous</a>
      </div>

      <!-- Hours -->
      <div class="foot-col">
        <h4>Horaires</h4>
        <div class="foot-row"><span>Lundi</span><span>10h - 19h</span></div>
        <div class="foot-row"><span>Mar – Dim</span><span>10h – 20h</span></div>

      </div>

    </div>

    <div class="foot-bottom">
      <p>© 2025 Bref Barber Shop — Paris</p>
      <span class="foot__ornament" aria-hidden="true">✦</span>
    </div>
    <a class="foot-row" href="https://elbaz-sofiane.fr">Créé par Sofiane Elbaz</a>
  </footer>

  <!-- JavaScript -->
  <script src="script.js"></script>
</body>
</html>