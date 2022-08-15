<footer class="app-footer">
    <div>
      <a href="https://coreui.io">CoreUI</a>
      <span>&copy; 2018 creativeLabs.</span>
    </div>
    <div class="ml-auto">
      <span>Powered by</span>
      <a href="https://coreui.io">CoreUI</a>
    </div>
  </footer>
  <!-- CoreUI and necessary plugins-->
  <script src="{{asset('coreui/vendors/jquery/js/jquery.min.js')}}"></script>
  <script src="{{asset('coreui/vendors/popper.js/js/popper.min.js')}}"></script>
  <script src="{{asset('coreui/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('coreui/vendors/pace-progress/js/pace.min.js')}}"></script>
  <script src="{{asset('coreui/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('coreui/vendors/@coreui/coreui/js/coreui.min.js')}}"></script>
  <!-- Plugins and scripts required by this view-->
  {{-- <script src="{{asset('coreui/vendors/chart.js/js/Chart.min.js')}}"></script>
  <script src="{{asset('coreui/vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js')}}"></script>
  <script src="{{asset('coreui/js/main.js')}}"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  
  @yield('ajax')
  
</body>
</html>