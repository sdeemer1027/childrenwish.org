<!-- resources/views/partials/admin_menu.blade.php -->

 <li class="nav-item dropdown">
   <a id="navbarDropdownadmin" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    Admin</a>     
     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownadmin">
        <a class="dropdown-item" href="{{ route('admin.wishes.index') }}">All Wishes</a>  
        <a class="dropdown-item" href="{{ route('admin.children.index') }}">All Children</a>  
        <a  class="dropdown-item" href="{{ route('admin.donors.index') }}">All Donors</a>
        <a  class="dropdown-item" href="{{ route('admin.guardians.index') }}">All Guardians</a>                           
     </div>
 </li>
 


