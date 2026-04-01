// File input label update
document.getElementById('fileUpload').addEventListener('change', function() {
    const label = document.getElementById('fileLabel');
    label.textContent = this.files && this.files.length > 0 ? this.files[0].name : "Select Playlist Photo";
});