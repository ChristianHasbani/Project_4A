const Lpresent = document.getElementById("present");
const Lpasse = document.getElementById("passé");
const Lpasse2 = document.getElementById("passé2");
const items = ["Present", "be","have"];
for (const item of items) {
    const newItem = document.createElement("li");
    newItem.textContent = item;
    Lpresent.appendChild(newItem);
  }

const items2 = ["Paste simple","was","had"];
for (const item of items2) {
    const newItem = document.createElement("li");
    newItem.textContent = item;
    Lpasse.appendChild(newItem);
  }
  
const items3 = ["Past perfect","were","had"];
for (const item of items3) {
    const newItem = document.createElement("li");
    newItem.textContent = item;
    Lpasse2.appendChild(newItem);
  }