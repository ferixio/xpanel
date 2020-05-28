import flatpickr from "flatpickr";
require('flatpickr/dist/flatpickr.min.css');
require('flatpickr/dist/flatpickr.min.js');

window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});

flatpickr('.x-date', {
  altInput: true,
    altFormat: "j F Y",
    dateFormat: "Y-m-d",
    defaultDate: Date.now()
});

// custom js
// document.querySelector(`a[href="${window.location.href}"]`).parentNode.classList.add('active');


document.addEventListener('DOMContentLoaded',()=>{
  let sidebar       = document.querySelector('#sidebar');
  let sidebarMenuUL = document.querySelectorAll('#sidebar-menu ul');
  let sidebarTitle  = document.querySelector('#sidebar-title-text');
  let toggleSidebar = document.querySelector('#toggle-sidebar');
  let btnGrid       = document.querySelector('#btn-grid');
  let btnList       = document.querySelector('#btn-list');
  let btnHapus      = document.querySelectorAll('.btn-hapus');
  let btnEdit       = document.querySelectorAll('.btn-edit');
  let btnAdd        = document.querySelector('#btn-add');
  let modalDialog   = document.querySelector('#modal-dialog');
  let modalTitle    = document.querySelector('#modal-title');
  let xGrid         = document.querySelector('#x-grid');
  let xGridItem     = document.querySelectorAll('.x-grid-item');
  let xGridDesc     = document.querySelectorAll('.x-grid-desc');
  let xGridIcon     = document.querySelectorAll('.x-grid-icon');
  let xGridIconLink = document.querySelectorAll('.x-grid-icon a');
  let viewMode      = localStorage.getItem('modeViewData') ?? '';
  let viewSidebar   = localStorage.getItem('modeViewSidebar') ?? '';
  

//  ============ cek element x grid ======================
 if (document.body.contains(xGrid)) {
    if (viewMode == 'grid' ) {
      viewGridData()
    } else {
      viewListData()
    }

    btnGrid.onclick = ()=>{
      localStorage.setItem('modeViewData' , 'grid');
      viewGridData();
    }
    
    btnList.onclick = ()=>{
      localStorage.setItem('modeViewData' , 'list');
      viewListData()
    }


    btnHapus.forEach((btn)=>{
      btn.onclick =  ()=>{
        UIkit.modal.confirm('Apakah anda ingin menghapus data ini?',  ()=>{
          alert('oke')
        })
      }
    });
    
    btnEdit.forEach((btn)=>{
      btn.onclick =  ()=>{
        modalTitle.innerHTML = "Perbarui Data"
        UIkit.modal(modalDialog).show();
      }
    });

    btnAdd.onclick = ()=>{
      modalTitle.innerHTML = "Tambah Data"
      UIkit.modal(modalDialog).show();
    }
 }
//  ============ end cek x grid ===============================

// ==================== sidebar animation ====================

  if (viewSidebar == 'small') {
    sidebarSmallMode()
  } else {
    sidebarWidthMode()
  }

  sidebar.onmouseover =  ()=>{
    sidebar.style.width = "220px";
    setTimeout(() => {
      sidebarTitle.style.display = "block";
    }, 400);
  }
  
  sidebar.onmouseleave =  ()=>{
       
    if (localStorage.getItem('modeViewSidebar') == 'small') {
      let navSub     = document.querySelectorAll('.uk-nav-sub');
      let hasSubMenu = document.querySelectorAll('.has-sub-menu');

      setTimeout(() => {
        navSub.forEach((ul)=>{
          ul.setAttribute('hidden' ,'');
        })
        hasSubMenu.forEach((li)=>{
          li.classList.remove('uk-open');
        })
      }, 400);


      sidebarSmallMode()
    } else {
      sidebarWidthMode()
    }
  }

  toggleSidebar.onclick = ()=>{
    if (sidebar.style.width == '50px') {
      sidebarWidthMode()
    } else {
      sidebarSmallMode()
    }
  }

  // ====================== end sidebar animation ======================
  





  // ================= function custom ===============

function sidebarWidthMode(){
  sidebar.style.width = "220px";
  setTimeout(() => {
    sidebarTitle.style.display = "block";
  }, 400);
  localStorage.setItem('modeViewSidebar' , 'width');
}

function sidebarSmallMode(){
  sidebar.style.width        = "50px";
  sidebarTitle.style.display = "none";
  localStorage.setItem('modeViewSidebar' , 'small');
}


function viewGridData(){
  xGrid.classList.remove('uk-child-width-1-1');
    xGridItem.forEach((grid)=>{
      grid.classList.add('uk-flex-column','uk-text-center')
    });

    xGridDesc.forEach((desc)=>{
      desc.classList.remove('uk-margin-medium-left');
      desc.classList.add('uk-margin-small-top');
    });

    xGridIcon.forEach((icon)=>{
      icon.classList.remove('uk-iconnav-vertical');
      icon.classList.add('uk-iconnav-horizontal');
    });

    xGridIconLink.forEach((link)=>{
      link.classList.remove('uk-transition-slide-right');
      link.classList.add('uk-transition-slide-bottom');
    });

    xGrid.classList.add('uk-child-width-1-4@l' , 'uk-child-width-1-3@m' , 'uk-child-width-1-2' );
}

function viewListData(){
  xGrid.classList.add('uk-child-width-1-1');
    xGridItem.forEach((grid)=>{
      grid.classList.remove('uk-flex-column','uk-text-center')
    });

    xGridDesc.forEach((desc)=>{
      desc.classList.add('uk-margin-medium-left');
      desc.classList.remove('uk-margin-small-top');
    });

    xGridIcon.forEach((icon)=>{
      icon.classList.add('uk-iconnav-vertical');
      icon.classList.remove('uk-iconnav-horizontal');
    });

    xGridIconLink.forEach((link)=>{
      link.classList.add('uk-transition-slide-right');
      link.classList.remove('uk-transition-slide-bottom');
    });

    xGrid.classList.remove('uk-child-width-1-4@l' , 'uk-child-width-1-3@m' , 'uk-child-width-1-2' );
}


// =================== end function custom ================
});