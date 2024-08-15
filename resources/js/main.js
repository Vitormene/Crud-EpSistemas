import Inputmask from 'inputmask';
document.addEventListener('DOMContentLoaded', function () {
    Inputmask({ mask: '999.999.999-99' }).mask('#cpf');
    Inputmask({ mask: '99999-999' }).mask('#cep');
    const toggleButton = document.querySelector('.navbar-toggler');
    const sidebar = document.getElementById('navbarToggleExternalContent');
    const updateButtonIcon = () => {
        if (sidebar.classList.contains('show')) {
            toggleButton.innerHTML = '<i class="fas fa-times"></i>';
        } else {
            toggleButton.innerHTML = '<span class="navbar-toggler-icon"></span>';
        }
    };
    updateButtonIcon();
    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        updateButtonIcon();
    });

    const checkboxes = document.querySelectorAll('.edit-checkbox');
    const saveButton = document.getElementById('appointmentSubmit');
    const buttonContainer = document.createElement('div');

    const editButton = document.createElement('button');
    const deleteButton = document.createElement('button');

    editButton.innerHTML = 'Editar';
    editButton.classList.add('btn', 'btn-primary', 'w-100');
    editButton.setAttribute('type', 'button');
    editButton.style.display = 'none';
    deleteButton.innerHTML = 'Excluir';
    deleteButton.classList.add('btn', 'btn-danger', 'w-100');
    deleteButton.setAttribute('type', 'button');
    deleteButton.style.display = 'none';

    buttonContainer.classList.add('row', 'mt-4');
    buttonContainer.style.display = 'none';
    const editCol = document.createElement('div');
    editCol.classList.add('col-md-6');
    editCol.appendChild(editButton);

    const deleteCol = document.createElement('div');
    deleteCol.classList.add('col-md-6');
    deleteCol.appendChild(deleteButton);

    buttonContainer.appendChild(editCol);
    buttonContainer.appendChild(deleteCol);
    saveButton.parentElement.appendChild(buttonContainer);

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', function () {
            const isChecked = this.checked;
            if (isChecked) {
                const id = this.getAttribute('data-id');
                const nome = this.getAttribute('data-nome');
                const whatsapp = this.getAttribute('data-whatsapp');
                const contact = this.getAttribute('data-contact');
                const cpf = this.getAttribute('data-cpf');
                const cep = this.getAttribute('data-cep');
                const conversion_origin = this.getAttribute('data-conversion_origin');
                const descricao = this.getAttribute('data-descricao');
                const tipo = this.getAttribute('data-tipo');
                const observacoes = this.getAttribute('data-observacoes');
                document.getElementById('appointmentId').value = id;
                document.getElementById('nome').value = nome;
                document.getElementById('whatsapp').value = whatsapp;
                document.getElementById('cpf').value = cpf;
                document.getElementById('contact').value = contact;
                document.getElementById('cep').value = cep;
                document.getElementById('conversion_origin').value = conversion_origin;
                document.getElementById('descricao').value = descricao;
                document.getElementById('tipo').value = tipo;
                document.getElementById('observacoes').value = observacoes;

                saveButton.style.display = 'none';  
                buttonContainer.style.display = 'flex';
                editButton.style.display = 'block';
                deleteButton.style.display = 'block'
            }
        });
    });

    editButton.addEventListener('click', function () {
        const id = document.getElementById('appointmentId').value;
    
        const data = {
            nome: document.getElementById('nome').value,
            whatsapp: document.getElementById('whatsapp').value,
            contact: document.getElementById('contact').value,
            cpf: document.getElementById('cpf').value,
            cep: document.getElementById('cep').value,
            conversion_origin: document.getElementById('conversion_origin').value,
            descricao: document.getElementById('descricao').value,
            tipo: document.getElementById('tipo').value,
            observacoes: document.getElementById('observacoes').value
        };

        fetch(`/appointments/${id}`, {
            method: 'PUT',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Atendimento atualizado com sucesso!');
                location.reload();
            } else {
                alert('Erro ao atualizar atendimento.');
            }
        })
        .catch(error => console.error('Erro:', error));
    });
    deleteButton.addEventListener('click', function () {
        const id = document.getElementById('appointmentId').value;
    
        if (confirm('Tem certeza que gostaria de excluir esse atendimento?')) {
            fetch(`/appointments/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Atendimento excluído com sucesso!');
                    location.reload();
                } else {
                    alert('Erro ao excluir atendimento.');
                }
            })
            .catch(error => console.error('Erro:', error));
        }
    });
});
