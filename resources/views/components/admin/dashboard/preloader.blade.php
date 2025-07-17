 <!-- Preloader -->
 <div class="preloader">
     <div class="d-flex flex-column align-items-center justify-content-center w-100 h-100">
         <img src="{{ asset('images/admin/logos/favicon.png') }}" alt="loader" class="img-fluid" width="140px"
             loading="lazy">
         <div
             style="font-size: 1.25rem; font-weight: 500; margin-top: 20px; animation: fadeIn 1s ease-in-out;">
             <span class="spinner-border spinner-border-sm me-2"></span> {{ config('app.name') }}
         </div>
     </div>
 </div>
