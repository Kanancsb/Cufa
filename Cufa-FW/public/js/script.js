document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('addFamiliar').addEventListener('click', function() {
        // Clonar a seção de dados familiares
        var dadosFamiliares = document.querySelector('#dadosFamiliares');
        var clone = dadosFamiliares.cloneNode(true);

        // Adicionar um sufixo numérico único aos campos clonados
        var inputs = clone.querySelectorAll('input, select');
        inputs.forEach(function(input) {
            input.name = input.name + '_extra[]';
        });

        // Limpar os valores dos campos clonados
        inputs.forEach(function(input) {
            input.value = '';
        });

        // Adicionar o clone ao formulário
        dadosFamiliares.after(clone);
        });
    });