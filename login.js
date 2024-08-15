const formulario = document.getElementById('form');
const inputs = document.querySelectorAll('#form input');
var respuesta = document.getElementById('respuesta');
function redirect()
{
    location.href="login.php";
}
const expresiones = {
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    password: /^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/,
}
const campos =
{
    email:false, password:false
}

const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "email":
            validarInput(expresiones.email,e.target,'email');
        break;
        case "password":
            validarInput(expresiones.password,e.target,'password');
        break;
    }
}

const validarInput = (expresion,input,campo) =>
{
    if(expresion.test(input.value))
    {
        if(`${campo}`=='password')
        {
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = true;
        }
        else
        {
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            campos[campo] = true;
        }
    }
    else
    {
        if(`${campo}`=='password')
        {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove("bg-success");
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
            campos[campo] = false;
        }
        else
        {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove("bg-success");
            campos[campo] = false;
        }
    }
}

inputs.forEach(
(inputs)=>
{
    inputs.addEventListener('keyup',validarFormulario);
    inputs.addEventListener('blur',validarFormulario);
})
formulario.addEventListener('submit',
(e)=>
{
    if(campos.email && campos.password)
    {
        var datos = new FormData(formulario);
        fetch('login.php',
        {
            method:'POST',
            body: datos
        })
    }
    else
    {
        e.preventDefault();
        respuesta.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 fw-bold text-center w-25" role="alert" style="margin:0 auto;">
            Por favor, rellene todos los campos.
        </div>`
    }
})