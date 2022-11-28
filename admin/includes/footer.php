<!-- JS Global Compulsory -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>

  <script src="../assets/vendor/popper.js/popper.min.js"></script>
  <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>

  <script src="../assets/vendor/cookiejs/jquery.cookie.js"></script>


  <!-- jQuery UI Core -->
  <script src="../assets/vendor/jquery-ui/ui/widget.js"></script>
  <script src="../assets/vendor/jquery-ui/ui/version.js"></script>
  <script src="../assets/vendor/jquery-ui/ui/keycode.js"></script>
  <script src="../assets/vendor/jquery-ui/ui/position.js"></script>
  <script src="../assets/vendor/jquery-ui/ui/unique-id.js"></script>
  <script src="../assets/vendor/jquery-ui/ui/safe-active-element.js"></script>

  <!-- jQuery UI Helpers -->
  <script src="../assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
  <script src="../assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>

  <!-- jQuery UI Widgets -->
  <script src="../assets/vendor/jquery-ui/ui/widgets/datepicker.js"></script>

  <!-- JS Plugins Init. -->
  <script src="../assets/vendor/appear.js"></script>
  <script src="../assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="../assets/vendor/flatpickr/dist/js/flatpickr.min.js"></script>
  <script src="../assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="../assets/vendor/chartist-js/chartist.min.js"></script>
  <script src="../assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.js"></script>
  <script src="../assets/vendor/fancybox/jquery.fancybox.min.js"></script>

  <!-- JS Unify -->
  <script src="../assets/js/hs.core.js"></script>
  <script src="../assets/js/components/hs.side-nav.js"></script>
  <script src="../assets/js/helpers/hs.hamburgers.js"></script>
  <script src="../assets/js/components/hs.range-datepicker.js"></script>
  <script src="../assets/js/components/hs.datepicker.js"></script>
  <script src="../assets/js/components/hs.dropdown.js"></script>
  <script src="../assets/js/components/hs.scrollbar.js"></script>
  <script src="../assets/js/components/hs.area-chart.js"></script>
  <script src="../assets/js/components/hs.donut-chart.js"></script>
  <script src="../assets/js/components/hs.bar-chart.js"></script>
  <script src="../assets/js/helpers/hs.focus-state.js"></script>
  <script src="../assets/js/components/hs.popup.js"></script>
  

  <!-- JS Custom -->
  <script src="../assets/js/custom.js"></script>

  <script src="js/scritps.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // initialization of custom select
      $('.js-select').selectpicker();

      // initialization of hamburger
      $.HSCore.helpers.HSHamburgers.init('.hamburger');


      // initialization of sidebar navigation component
      $.HSCore.components.HSSideNav.init('.js-side-nav', {
        afterOpen: function() {
        },
        afterClose: function() {
        }
      });
      // initialization of datepicker
      $.HSCore.components.HSDatepicker.init('#datepicker', {
        dayNamesMin: [
          'SU',
          'MO',
          'TU',
          'WE',
          'TH',
          'FR',
          'SA'
        ]
      });

      // initialization of HSDropdown component
      $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});

      // initialization of custom scrollbar
      $.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));

      // initialization of popups
      $.HSCore.components.HSPopup.init('.js-fancybox', {
        btnTpl: {
          smallBtn: '<button data-fancybox-close class="btn g-pos-abs g-top-25 g-right-30 g-line-height-1 g-bg-transparent g-font-size-16 g-color-gray-light-v3 g-brd-none p-0" title=""><i class="hs-admin-close"></i></button>'
        }
      });
    });
  </script>
</body>

</html>
