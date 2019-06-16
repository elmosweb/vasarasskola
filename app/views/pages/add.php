<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="card card-body bg-light mt-5">
  <div class="text-center">
    <h2>Darāmo lietu saraksts</h2>
    <p>Pievienot jaunu</p>
    </div>
    <form action="<?php echo URLROOT; ?>/pages/add/" method="post">
      <div class="form-group">
        <label for="title">Virsraksts</label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">Apraksts</label>
        <textarea name="body" class="form-control form-control-lg"  value="<?php echo $data['body']; ?>"></textarea>
        <span class="invalid-feedback"></span>
      </div>
      <a href="<?php echo URLROOT; ?>" class="btn btn-secondary self-align-start">Doties atpakaļ</a>
      <input type="submit" class="btn btn-success float-right" value="Pievienot">
    </form>

  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>