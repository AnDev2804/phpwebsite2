const formulario1 = document.getElementById('formulario1');
const input1 = document.querySelectorAll('#formulario1 input');
var respuesta1 = document.getElementById('respuesta1');
function reinicio()
{
    location.href=location.href;
}
const expresiones1 = {
    ci: /^\d{7,8}$/
}
const campoci1 =
{
    ci:false
}
const validarFormulario1 = (e)=>{
    switch (e.target.name)
    {
        case "ci":
            validarCI1(expresiones1.ci,e.target,'ci');
        break;
    }
}
const validarCI1 = (expresion,input,campo) =>
{
    if(expresion.test(input.value))
    {
        
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            campoci1[campo] = true;
    }
    else
    {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove("bg-success");
            campoci1[campo] = false;
    }
}
input1.forEach(
    (inputs)=>
    {
        inputs.addEventListener('keyup',validarFormulario1);
        inputs.addEventListener('blur',validarFormulario1);
    })
formulario1.addEventListener('submit',
(e)=>
{
    if(campoci1.ci)
    {
        var datos = new FormData(formulario1);
        fetch('actualizarpac.php',
        {
            method:'POST',
            body: datos
        })
    }
    else
    {
        e.preventDefault();
        respuesta1.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 text-center fw-bold w-50" role="alert">
            Por favor, provea la cédula correctamente.
        </div>`
        setTimeout(()=>
                    {
                        respuesta1.innerHTML=``
                    }, 4000);
    }
})

const formulario3 = document.getElementById('formulario3');
const input3 = document.querySelectorAll('#formulario3 input');
var respuesta3 = document.getElementById('respuesta3');
const expresiones3 = {
    ci2: /^\d{7,8}$/
}
const campoCI2 =
{
    ci2:false
}
const validarFormulario3 = (e)=>{
    switch (e.target.name)
    {
        case "ci2":
            validarCI2(expresiones3.ci2,e.target,'ci2');
        break;
    }
}
const validarCI2 = (expresion,input,campo) =>
{
    if(expresion.test(input.value))
    {
        
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            campoCI2[campo] = true;
    }
    else
    {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove("bg-success");
            campoCI2[campo] = false;
    }
}
input3.forEach(
    (inputs)=>
    {
        inputs.addEventListener('keyup',validarFormulario3);
        inputs.addEventListener('blur',validarFormulario3);
    })
formulario3.addEventListener('submit',
(e)=>
{
    if(campoCI2.ci2)
    {
        var datos = new FormData(formulario3);
        fetch('.php',
        {
            method:'POST',
            body: datos
        })
    }
    else
    {
        e.preventDefault();
        respuesta3.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 text-center fw-bold w-50" role="alert">
            Por favor, provea la cédula correctamente.
        </div>`
        setTimeout(()=>
                    {
                        respuesta3.innerHTML=``
                    }, 4000);
    }
})