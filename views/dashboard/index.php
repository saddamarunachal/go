<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2>Dashboard</h2>
<div class="row">
  <div class="col-md-3">
    <div class="card text-center">
      <div class="card-body">
        <h5>Clients</h5>
        <p class="display-6"><?php echo $kpis['clients']; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center">
      <div class="card-body">
        <h5>Leads</h5>
        <p class="display-6"><?php echo $kpis['leads']; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center">
      <div class="card-body">
        <h5>Deals</h5>
        <p class="display-6"><?php echo $kpis['deals']; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center">
      <div class="card-body">
        <h5>Activities</h5>
        <p class="display-6"><?php echo $kpis['activities']; ?></p>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
