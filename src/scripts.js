const button = document.querySelector("#input-add-phone")
const container = document.querySelector("#more-buttons")
let total = 1;

button.addEventListener("click", (e) => {
    e.preventDefault()
    if (total < 2) {
        container.innerHTML += `
        <div class="linha-form">
            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="tel[]" placeholder="Insira o(s) Telefone(s) no formato (DD) 9XXXX-XXXX" class="campo-form campo-form-input-icon" pattern="\\([0-9]{2}\\) [9][0-9]{4}-[0-9]{4}" title="É necessário seguir o padrão (DD) 9XXXX-XXXX">
        </div>
                    `
        total++
    } else {
        alert("Você só pode inserir dois telefones!")
    }
    console.log('teste')
})