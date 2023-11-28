<style>
  @media print {
    #print-purchase {
          display: block;
      }

    #othercontent {
        display: none;
    }

    #layout-navbar{
      display: none;
    }

    #hidefooterp{
      display: none;
    }

  }
</style>


<!-- Footer-->
<footer class="content-footer footer bg-footer-theme" id="hidefooterp">
  <div class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }} d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      © 2015 - <script>
        document.write(new Date().getFullYear())

      </script>
      , made by <a href="https://siggmaa.com/" target="_blank" class="footer-link fw-bolder">SIGGMAA</a>
    </div>
    <div>
      <a href="" class="footer-link me-4" target="_blank">License</a>
      <a href="" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
    </div>
  </div>
</footer>
<!--/ Footer-->
