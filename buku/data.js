const searchInput = document.getElementById("searchInput");
const suggestions = document.getElementById("suggestions");

// Data contoh untuk rekomendasi
const items = [
  "Apple",
  "Banana",
  "Orange",
  "Mango",
  "Pineapple",
  "Grape",
  "Watermelon",
  "Avocado",
];

// Fungsi untuk memperbarui daftar rekomendasi
searchInput.addEventListener("input", () => {
  const query = searchInput.value.toLowerCase();
  suggestions.innerHTML = ""; // Kosongkan rekomendasi sebelumnya
  if (query) {
    const filteredItems = items.filter((item) =>
      item.toLowerCase().startsWith(query)
    );

    filteredItems.forEach((item) => {
      const div = document.createElement("div");
      div.classList.add("suggestion");
      div.textContent = item;
      // Ketika user klik saran, isi input dengan nilai yang dipilih
      div.addEventListener("click", () => {
        searchInput.value = item;
        suggestions.innerHTML = ""; // Kosongkan rekomendasi
      });
      suggestions.appendChild(div);
    });

    suggestions.style.display = filteredItems.length ? "block" : "none";
  } else {
    suggestions.style.display = "none";
  }
});
