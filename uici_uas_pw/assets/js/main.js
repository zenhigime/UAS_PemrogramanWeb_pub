// Modal edit
const editButtons = document.querySelectorAll('.edit-btn');
const modal = document.getElementById('editModal');
const editId = document.getElementById('edit-id');
const editName = document.getElementById('edit-name');

editButtons.forEach(button => {
  button.addEventListener('click', () => {
    const itemId = button.getAttribute('data-id');
    const itemName = button.getAttribute('data-name');

    editId.value = itemId;
    editName.value = itemName;
    modal.classList.remove('hidden');
  });
});

function closeModal() {
  modal.classList.add('hidden');
}
