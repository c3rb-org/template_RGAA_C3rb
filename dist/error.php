<?php defined( '_JEXEC' ) or die; ?>
<!DOCTYPE html> 
<html>
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Erreur..</title>
  <link rel="stylesheet" href="">
</head> 
<body>
  <?php echo $this->error->getCode(); ?>
 <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8');?>
</body>
</html>