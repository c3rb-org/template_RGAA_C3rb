<style type="text/css" media="screen">
  /*! Tablesaw - v1.0.3 - 2015-01-27
* https://github.com/filamentgroup/tablesaw
* Copyright (c) 2015 Filament Group; Licensed MIT */
.btn:focus{outline:dotted 2px #000}div.active:focus{outline:dotted 1px #000}a:focus{outline:dotted 1px #000}.close:hover,.close:focus{outline:dotted 1px #000}.nav>li>a:hover,.nav>li>a:focus{outline:dotted 1px #000}.carousel-inner>.item{position:absolute;top:-999999em;display:block;-webkit-transition:0.6s ease-in-out left;-moz-transition:0.6s ease-in-out left;-o-transition:0.6s ease-in-out left;transition:0.6s ease-in-out left}.carousel-inner>.active{top:0}.carousel-inner>.active,.carousel-inner>.next,.carousel-inner>.prev{position:relative}.carousel-inner>.next,.carousel-inner>.prev{position:absolute;top:0;width:100%}.alert-success{color:#2d4821}.alert-info{color:#214c62}.alert-warning{color:#6c4a00;background-color:#f9f1c6}.alert-danger{color:#d2322d}.alert-danger:hover{color:#a82824}

table.tablesaw {
  empty-cells: show;
  max-width: 100%;
  width: 100%;
}

.tablesaw {
  border-collapse: collapse;
  width: 100%;
}

/* Structure */

.tablesaw {
  border: 0;
  padding: 0;
}

.tablesaw th,
.tablesaw td {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: .5em .7em;
}

.tablesaw thead tr:first-child th {
  padding-top: .9em;
  padding-bottom: .7em;
}

/* Table rows have a gray bottom stroke by default */

.tablesaw-stack tbody tr {}

.tablesaw-stack td .tablesaw-cell-label,
.tablesaw-stack th .tablesaw-cell-label {
  display: none;
}

/* Mobile first styles: Begin with the stacked presentation at narrow widths */

@media only all {
  /* Show the table cells as a block level element */

  .tablesaw-stack td,
  .tablesaw-stack th {
    text-align: left;
    display: block;
  }

  .tablesaw-stack tr {
    clear: both;
    display: table-row;
  }

  /* Make the label elements a percentage width */

  .tablesaw-stack td .tablesaw-cell-label,
  .tablesaw-stack th .tablesaw-cell-label {
    display: block;
    padding: 0 .6em 0 0;
    width: 30%;
    display: inline-block;
  }

  /* For grouped headers, have a different style to visually separate the levels by classing the first label in each col group */

  .tablesaw-stack th .tablesaw-cell-label-top,
  .tablesaw-stack td .tablesaw-cell-label-top {
    display: block;
    padding: .4em 0;
    margin: .4em 0;
  }

  .tablesaw-cell-label {
    display: block;
  }

  /* Avoid double strokes when stacked */

  .tablesaw-stack tbody th.group {
    margin-top: -1px;
  }

  /* Avoid double strokes when stacked */

  .tablesaw-stack th.group b.tablesaw-cell-label {
    display: none !important;
  }
}

@media (max-width: 39.9375em) {
  .tablesaw-stack thead td,
  .tablesaw-stack thead th {
    display: none;
  }

  .tablesaw-stack tbody td,
  .tablesaw-stack tbody th {
    clear: left;
    float: left;
    width: 100%;
  }

  .tablesaw-cell-label {
    vertical-align: top;
  }

  .tablesaw-cell-content {
    max-width: 67%;
    display: inline-block;
  }

  .tablesaw-stack td:empty,
  .tablesaw-stack th:empty {
    display: none;
  }
}

/* Media query to show as a standard table at 560px (35em x 16px) or wider */

@media (min-width: 40em) {
  .tablesaw-stack tr {
    display: table-row;
  }

  /* Show the table header rows */

  .tablesaw-stack td,
  .tablesaw-stack th,
  .tablesaw-stack thead td,
  .tablesaw-stack thead th {
    display: table-cell;
    margin: 0;
  }

  /* Hide the labels in each cell */

  .tablesaw-stack td .tablesaw-cell-label,
  .tablesaw-stack th .tablesaw-cell-label {
    display: none !important;
  }
}
</style>
<div class="container">  
  <div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h1>Exemple Interface bootstrap</h1>
      <hr />
      <h2>Navbar</h2> 
      <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Title</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <hr />
      <h2>Titre</h2>
      <h1>h1. Bootstrap heading</h1>
      <h2>h2. Bootstrap heading</h2>
      <h3>h3. Bootstrap heading</h3>
      <h4>h4. Bootstrap heading</h4>
      <h5>h5. Bootstrap heading</h5>
      <h6>h6. Bootstrap heading</h6>
      <hr />
      <h2>blockquote</h2>
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
      <hr />
      <h2>Form</h2>
      <h3>Classic</h3>
      <form action="" method="POST" role="form">
        <legend>Form legend</legend>
        <div class="form-group">
          <label for="">label</label>
          <input type="text" class="form-control" id="" placeholder="Input field">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <hr />
      <h3>Inline</h3>
      <form action="" method="POST" class="form-inline" role="form">
        <div class="form-group">
          <label class="sr-only" for="">label</label>
          <input type="email" class="form-control" id="" placeholder="Input field">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <hr />
      <h2>bouton large btn-lg</h2>
      <button type="button" class="btn btn-default btn-lg">Default</button>
      <button type="button" class="btn btn-primary btn-lg">Primary</button>
      <button type="button" class="btn btn-success btn-lg">Success</button>
      <button type="button" class="btn btn-info btn-lg">Info</button>
      <button type="button" class="btn btn-warning btn-lg">Warning</button>
      <button type="button" class="btn btn-danger btn-lg">Danger</button>
      <button type="button" class="btn btn-link btn-lg">Link</button>

      <hr />
      <h2>bouton default</h2>
      <button type="button" class="btn btn-default">Default</button>
      <button type="button" class="btn btn-primary">Primary</button>
      <button type="button" class="btn btn-success">Success</button>
      <button type="button" class="btn btn-info">Info</button>
      <button type="button" class="btn btn-warning">Warning</button>
      <button type="button" class="btn btn-danger">Danger</button>
      <!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
      <button type="button" class="btn btn-link">Link</button>
      <hr />
      <h2>bouton small btn-sm</h2>
      <button type="button" class="btn btn-default btn-sm">Default</button>
      <button type="button" class="btn btn-primary btn-sm">Primary</button>
      <button type="button" class="btn btn-success btn-sm">Success</button>
      <button type="button" class="btn btn-info btn-sm">Info</button>
      <button type="button" class="btn btn-warning btn-sm">Warning</button>
      <button type="button" class="btn btn-danger btn-sm">Danger</button>
      <button type="button" class="btn btn-link btn-sm">Link</button>

      <hr />
      <h2>bouton extra small btn-xs</h2>
      <button type="button" class="btn btn-default btn-xs">Default</button>
      <button type="button" class="btn btn-primary btn-xs">Primary</button>
      <button type="button" class="btn btn-success btn-xs">Success</button>
      <button type="button" class="btn btn-info btn-xs">Info</button>
      <button type="button" class="btn btn-warning btn-xs">Warning</button>
      <button type="button" class="btn btn-danger btn-xs">Danger</button>
      <button type="button" class="btn btn-link btn-xs">Link</button>


      <hr />
      <h2>table</h2>
      <table class="table">
        <caption>Optional table caption.</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
      <hr />
      <h2>table stripped</h2> 
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th> 
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
      <hr />
      <h2>table bordered</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
      <hr />
      <h2>table overed</h2>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
      <hr />
      <h2>table overed</h2>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
      <hr />
      <h2>table complexe</h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Column heading</th>
            <th>Column heading</th>
            <th>Column heading</th>
          </tr>
        </thead>
        <tbody>
          <tr class="active">
            <th scope="row">1</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
          <tr class="success">
            <th scope="row">3</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
          <tr class="info">
            <th scope="row">5</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
          <tr class="warning">
            <th scope="row">7</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
          <tr class="danger">
            <th scope="row">9</th>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
        </tbody>
      </table>      

      <hr />
      <h2>table responsive (à la Jquery)</h2>
      <h3></h3>
      <code>
        ajouter : data-tablesaw-mode="stack" sur le table
        Il est possible de combiner avec les class de style du bootstrap
      </code>
      <br />

      <table data-tablesaw-mode="stack" class="table table-bordered" id="table-8288">
        <thead>
          <tr>
            <th width="10%" scope="Aperçu">Aperçu</th>
            <th width="30%" scope="Titre">Titre</th>
            <th width="25%" scope="Auteur">Auteur</th>
            <th width="20%" scope="Editeur">Editeur</th>
            <th width="5%" scope="Nbre exemplaires">Nbre exemplaires</th>
            <th width="10%" scope="Panier">Panier</th>
          </tr>
        </thead>
        <tbody>
          <tr class="ligneA " id="row_ntc_1300102385:9801"><td data-label="Aperçu"><div class="couverture" id="couvloaded_1300102385:9801"><div class="orphee"><a href="/index.php?option=com_opac&amp;task=DetailNtcFull&amp;view=DetailNotice&amp;num_ntc=1300102385:9801&amp;fas=0&amp;is_media_ntc=0&amp;Itemid=236"><img alt="Corpus Christi - Temple" src=""></a><div class="clearfix"></div><span>MEDNUM</span></div></div><span data-ntc="1300102385:9801" class="note_ntc" id="note_1300102385:9801"></span><br></td><td data-label="Titre"><a href="/index.php?option=com_opac&amp;view=DetailNotice&amp;task=DetailNtcFull&amp;num_ntc=1300102385:9801&amp;fas=0&amp;Itemid=236&amp;is_media_ntc=0">Corpus Christi - Temple</a><br></td><td data-label="Auteur"><a href="/index.php?option=com_opac&amp;task=RechSimple&amp;layout=colonne&amp;type_rech1=2&amp;mots1=Prieur,+Jerome+(1951_....)&amp;Itemid=236">Prieur, Jérôme (1951-....)</a><br></td><td data-label="Editeur"></td><td data-label="Nbre exemplaires">1<br></td><td data-label="Panier"><div id="tt_panier_1300102385:9801"></div><span style="text-decoration: none; color: #333;" title="" class="editlinktip hasTip"><a id="lnk_panier_1300102385:9801" onclick="add_ntc_panier('1300102385:9801','panier_1300102385:9801',0,236);" href="javascript:void(0)"><img id="panier_1300102385:9801" alt="Ajouter dans le panier Corpus Christi - Temple" src="http://mediatheque.clamart.fr/components/com_opac/assets/images/add_panier.png"></a></span><br></td></tr>
          <tr class="ligneB " id="row_ntc_1300102968:9801"><td data-label="Aperçu"><div class="couverture" id="couvloaded_1300102968:9801"><div class="orphee"><a href="/index.php?option=com_opac&amp;task=DetailNtcFull&amp;view=DetailNotice&amp;num_ntc=1300102968:9801&amp;fas=0&amp;is_media_ntc=0&amp;Itemid=236"><img alt="Gardien de buffles" src=""></a><div class="clearfix"></div><span>MEDNUM</span></div></div><span data-ntc="1300102968:9801" class="note_ntc" id="note_1300102968:9801"></span><br></td><td data-label="Titre"><a href="/index.php?option=com_opac&amp;view=DetailNotice&amp;task=DetailNtcFull&amp;num_ntc=1300102968:9801&amp;fas=0&amp;Itemid=236&amp;is_media_ntc=0">Gardien de buffles</a><br></td><td data-label="Auteur"><a href="/index.php?option=com_opac&amp;task=RechSimple&amp;layout=colonne&amp;type_rech1=2&amp;mots1=Nguyen_Vo,+Nghiem_Minh&amp;Itemid=236">Nguyen-Vo, Nghiem-Minh</a><br></td><td data-label="Editeur"></td><td data-label="Nbre exemplaires">1<br></td><td data-label="Panier"><div id="tt_panier_1300102968:9801"></div><span style="text-decoration: none; color: #333;" title="" class="editlinktip hasTip"><a id="lnk_panier_1300102968:9801" onclick="add_ntc_panier('1300102968:9801','panier_1300102968:9801',0,236);" href="javascript:void(0)"><img id="panier_1300102968:9801" alt="Ajouter dans le panier Gardien de buffles" src="http://mediatheque.clamart.fr/components/com_opac/assets/images/add_panier.png"></a></span><br></td></tr>
          <tr class="ligneA " id="row_ntc_1300100254:9801"><td data-label="Aperçu"><div class="couverture" id="couvloaded_1300100254:9801"><div class="orphee"><a href="/index.php?option=com_opac&amp;task=DetailNtcFull&amp;view=DetailNotice&amp;num_ntc=1300100254:9801&amp;fas=0&amp;is_media_ntc=0&amp;Itemid=236"><img alt="Hermanito - Un chaman mexicain" src=""></a><div class="clearfix"></div><span>MEDNUM</span></div></div><span data-ntc="1300100254:9801" class="note_ntc" id="note_1300100254:9801"></span><br></td><td data-label="Titre"><a href="/index.php?option=com_opac&amp;view=DetailNotice&amp;task=DetailNtcFull&amp;num_ntc=1300100254:9801&amp;fas=0&amp;Itemid=236&amp;is_media_ntc=0">Hermanito - Un chaman mexicain</a><br></td><td data-label="Auteur"><a href="/index.php?option=com_opac&amp;task=RechSimple&amp;layout=colonne&amp;type_rech1=2&amp;mots1=Arnaud,+Marie&amp;Itemid=236">Arnaud, Marie</a><br></td><td data-label="Editeur"></td><td data-label="Nbre exemplaires">1<br></td><td data-label="Panier"><div id="tt_panier_1300100254:9801"></div><span style="text-decoration: none; color: #333;" title="" class="editlinktip hasTip"><a id="lnk_panier_1300100254:9801" onclick="add_ntc_panier('1300100254:9801','panier_1300100254:9801',0,236);" href="javascript:void(0)"><img id="panier_1300100254:9801" alt="Ajouter dans le panier Hermanito - Un chaman mexicain" src="http://mediatheque.clamart.fr/components/com_opac/assets/images/add_panier.png"></a></span><br></td></tr>
          <tr class="ligneB " id="row_ntc_1300100339:9801"><td data-label="Aperçu"><div class="couverture" id="couvloaded_1300100339:9801"><div class="orphee"><a href="/index.php?option=com_opac&amp;task=DetailNtcFull&amp;view=DetailNotice&amp;num_ntc=1300100339:9801&amp;fas=0&amp;is_media_ntc=0&amp;Itemid=236"><img alt="Journal d'un curé de campagne" src=""></a><div class="clearfix"></div><span>MEDNUM</span></div></div><span data-ntc="1300100339:9801" class="note_ntc" id="note_1300100339:9801"></span><br></td><td data-label="Titre"><a href="/index.php?option=com_opac&amp;view=DetailNotice&amp;task=DetailNtcFull&amp;num_ntc=1300100339:9801&amp;fas=0&amp;Itemid=236&amp;is_media_ntc=0">Journal d'un curé de campagne</a><br></td><td data-label="Auteur"><a href="/index.php?option=com_opac&amp;task=RechSimple&amp;layout=colonne&amp;type_rech1=2&amp;mots1=Bresson,+Robert+(1901_1999)&amp;Itemid=236">Bresson, Robert (1901-1999)</a><br></td><td data-label="Editeur"></td><td data-label="Nbre exemplaires">1<br></td><td data-label="Panier"><div id="tt_panier_1300100339:9801"></div><span style="text-decoration: none; color: #333;" title="" class="editlinktip hasTip"><a id="lnk_panier_1300100339:9801" onclick="add_ntc_panier('1300100339:9801','panier_1300100339:9801',0,236);" href="javascript:void(0)"><img id="panier_1300100339:9801" alt="Ajouter dans le panier Journal d'un curé de campagne" src="http://mediatheque.clamart.fr/components/com_opac/assets/images/add_panier.png"></a></span><br></td></tr>
          <tr class="ligneA " id="row_ntc_1300102907:9801"><td data-label="Aperçu"><div class="couverture" id="couvloaded_1300102907:9801"><div class="orphee"><a href="/index.php?option=com_opac&amp;task=DetailNtcFull&amp;view=DetailNotice&amp;num_ntc=1300102907:9801&amp;fas=0&amp;is_media_ntc=0&amp;Itemid=236"><img alt="Pour aller au ciel, il faut mourir" src=""></a><div class="clearfix"></div><span>MEDNUM</span></div></div><span data-ntc="1300102907:9801" class="note_ntc" id="note_1300102907:9801"></span><br></td><td data-label="Titre"><a href="/index.php?option=com_opac&amp;view=DetailNotice&amp;task=DetailNtcFull&amp;num_ntc=1300102907:9801&amp;fas=0&amp;Itemid=236&amp;is_media_ntc=0">Pour aller au ciel, il faut mourir</a><br></td><td data-label="Auteur"><a href="/index.php?option=com_opac&amp;task=RechSimple&amp;layout=colonne&amp;type_rech1=2&amp;mots1=Usmonov,+Djamshed&amp;Itemid=236">Usmonov, Djamshed</a><br></td><td data-label="Editeur"></td><td data-label="Nbre exemplaires">1<br></td><td data-label="Panier"><div id="tt_panier_1300102907:9801"></div><span style="text-decoration: none; color: #333;" title="" class="editlinktip hasTip"><a id="lnk_panier_1300102907:9801" onclick="add_ntc_panier('1300102907:9801','panier_1300102907:9801',0,236);" href="javascript:void(0)"><img id="panier_1300102907:9801" alt="Ajouter dans le panier Pour aller au ciel, il faut mourir" src="http://mediatheque.clamart.fr/components/com_opac/assets/images/add_panier.png"></a></span><br></td></tr>
        </tbody>
      </table>

      <table summary="Tableau des exemplaires" id="table-documents" class="table table-striped" data-tablesaw-mode="stack">
        <caption>Exemplaires</caption>


        <thead>
        <tr>
        <th width="8%" scope="Code barre"><a onclick="ts_resortTable(this, 0);return false;" class="sortheader" href="#">Code barre<span class="sortarrow"></span></a></th><th width="6%" scope="Support"><a onclick="ts_resortTable(this, 1);return false;" class="sortheader" href="#">Support<span class="sortarrow"></span></a></th><th width="12%" scope="Cote"><a onclick="ts_resortTable(this, 2);return false;" class="sortheader" href="#">Cote<span class="sortarrow"></span></a></th><th width="8%" scope="Section"><a onclick="ts_resortTable(this, 3);return false;" class="sortheader" href="#">Section<span class="sortarrow"></span></a></th><th width="8%" scope="Situation"><a onclick="ts_resortTable(this, 4);return false;" class="sortheader" href="#">Situation<span class="sortarrow"></span></a></th><th width="8%" scope="Date retour"><a onclick="ts_resortTable(this, 5);return false;" class="sortheader" href="#">Date retour<span class="sortarrow"></span></a></th><th width="14%" scope="localisation d'origine"><a onclick="ts_resortTable(this, 6);return false;" class="sortheader" href="#">localisation d'origine<span class="sortarrow"></span></a></th><th width="14%" scope="Bib. d'origine"><a onclick="ts_resortTable(this, 7);return false;" class="sortheader" href="#">Bib. d'origine<span class="sortarrow"></span></a></th><th width="10%" scope="Utilisation"><a onclick="ts_resortTable(this, 8);return false;" class="sortheader" href="#">Utilisation<span class="sortarrow"></span></a></th></tr></thead> <tbody>
        <tr><td data-label="Code barre">1315152</td><td data-label="Support">Livre</td><td data-label="Cote">BD DIA</td><td data-label="Section">Adulte</td><td data-label="Situation">En rayon</td><td data-label="Date retour"></td><td data-label="localisation d'origine"></td><td data-label="Bib. d'origine">François Mitterrand</td><td data-label="Utilisation">Prêt normal</td></tr><tr><td data-label="Code barre">1469263</td><td data-label="Support">Livre</td><td data-label="Cote">BD DIA</td><td data-label="Section">Adulte</td><td data-label="Situation">En rayon</td><td data-label="Date retour"></td><td data-label="localisation d'origine">Sous-sol</td><td data-label="Bib. d'origine">Buanderie</td><td data-label="Utilisation">Prêt normal</td></tr><tr><td data-label="Code barre">1315154</td><td data-label="Support">Livre</td><td data-label="Cote">BD DIA</td><td data-label="Section">Adulte</td><td data-label="Situation">En rayon</td><td data-label="Date retour"></td><td data-label="localisation d'origine">Sous-sol</td><td data-label="Bib. d'origine">Buanderie</td><td data-label="Utilisation">Prêt normal</td></tr></tbody>
      </table>

      <hr />
      <h2>Modal</h2><span class="label label-danger">OUT</span>
      
      <!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalxx">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModalxx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li><a href="#home" data-toggle="tab">Home</a></li>
  <li><a href="#profile" data-toggle="tab">Profile</a></li>
  <li><a href="#messages" data-toggle="tab">Messages</a></li>
  <li><a href="#settings" data-toggle="tab">Settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active fade" id="home">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
  <div class="tab-pane fade" id="profile">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
  <div class="tab-pane fade" id="messages">.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
  <div class="tab-pane fade" id="settings">.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</div>
</div>
    </div>
  </div>
</div>
