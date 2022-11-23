<section class="py-5" style="min-height:400px;">
  <div class="container">
    <?php
    if ($this->session->flashdata('code')) {
    ?>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <p>
          <center>
            <h3><strong>Notification! </strong><em><?= $this->session->flashdata('code') . " - " . $this->session->flashdata('message') ?></em></h3><br/>
            <div id="countdown"></div>
          </center>
        </p>
      </div>
    </div>
    <?php
      if($this->session->flashdata('redirect')){
    ?>
    <script>
      setTimeout(function () {
        window.location.href="<?=base_url().$this->session->flashdata('redirect')?>";
      }, 6000);

      var timeleft = 5;
      var downloadTimer = setInterval(function(){
        if(timeleft <= 0){
          clearInterval(downloadTimer);
          document.getElementById("countdown").innerHTML = "Finished";
        } else {
          document.getElementById("countdown").innerHTML = "Anda akan diarahkan ke halaman depan dalam " + timeleft + " detik";
        }
        timeleft -= 1;
      }, 1000);
    </script>
    <?php
      }
    }
    ?>
  </div>
</section>