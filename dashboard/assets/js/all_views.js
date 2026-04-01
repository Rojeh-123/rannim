document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.getElementById('hamburger');
  const sidebar = document.querySelector('.sidebar');
  const sidebarClose = document.getElementById('sidebarClose');

  // Hamburger opens sidebar
  hamburger?.addEventListener('click', e => {
    e.stopPropagation(); // prevent triggering document click
    sidebar.classList.add('show');
  });

  // X button closes sidebar
  sidebarClose?.addEventListener('click', e => {
    e.stopPropagation();
    sidebar.classList.remove('show');
  });

  // Click outside closes sidebar
  document.addEventListener('click', e => {
    if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
      sidebar.classList.remove('show');
    }
  });
});


// Notifications popup
const bellBtn = document.getElementById('bellBtn');
const notifPopup = document.getElementById('notifPopup');
bellBtn?.addEventListener('click', ()=> notifPopup.classList.toggle('show'));

// Profile popup
const profileBtn = document.getElementById('profileBtn');
const profilePopup = document.getElementById('profilePopup');
profileBtn?.addEventListener('click', ()=> profilePopup.classList.toggle('show'));

// Close popups on outside click
document.addEventListener('click', e=>{
  if(!bellBtn.contains(e.target) && !notifPopup.contains(e.target)) notifPopup.classList.remove('show');
  if(!profileBtn.contains(e.target) && !profilePopup.contains(e.target)) profilePopup.classList.remove('show');
});

const share_link = document.getElementById("share_link");
function copy_to_clipboard() {
    share_link.select();
    share_link.setSelectionRange(0, 99999); // For mobile devices
    navigator.clipboard.writeText(share_link.value);
    document.getElementById("copy_btn").innerText = "Link Copied!";
    setTimeout(() => {
        document.getElementById("copy_btn").innerText = "Copy Link";
    }, 3000);
}