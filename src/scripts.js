const button = document.querySelector("#input-add-phone")
const container = document.querySelector("#more-buttons")
let total = 1;

button.addEventListener("click", (e) => {
    e.preventDefault()
    if (total < 2) {
        container.innerHTML += `
        <div class="linha-form">
            <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="tel[]" placeholder="Insira o(s) Telefone(s)"class="campo-form campo-form-input-icon">
        </div>
                    `
        total++
    } else {
        alert("Você só pode inserir dois telefones!")
    }
    console.log('teste')
})