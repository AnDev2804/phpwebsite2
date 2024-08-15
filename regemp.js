const formulario = document.getElementById('regform');
const inputs = document.querySelectorAll('#regform input');
const selects = document.querySelectorAll('#regform select');
const texto = document.querySelectorAll('#regform textarea');
var respuesta = document.getElementById('respuesta');
const expresiones = {
    empcorreo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    emppass: /^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/,
    empci: /^\d{7,8}$/,
    empNo1: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    empAp1: /^[a-zA-ZÀ-ÿ\s]{2,10}$/,
    empNo2: /^[a-zA-ZÀ-ÿ\s]{0,10}$/,
    empAp2: /^[a-zA-ZÀ-ÿ\s]{0,10}$/,
    esp: /^(1|2)$/,
    Fini: /^\d{4}-\d{2}-\d{2}$/,
    Ffin: /^\d{4}-\d{2}-\d{2}$/,
    dact: /^[A-Za-záéÁÉ,.\n\s]+$/u,
    titref: /^\d{8,12}$/,
    sex: /^(F|M|O)$/,
    ntel: /^\d{10}$/,
    
}
const campos =
{
    empcorreo: false,
    emppass: false,
    empci: false,
    empNo1: false,
    empAp1: false,
    empNo2: false,
    empAp2: false,
    esp: false,
    Fini: false,
    Ffin:false,
    dact: false,
    titref:false,
    sex: false,
    ntel: false,
}

const validarFormulario = (e)=>{
    switch (e.target.name)
    {
        case "empcorreo":
            validarInput(expresiones.empcorreo,e.target,'empcorreo');
        break;
        case "emppass":
            validarInput(expresiones.emppass,e.target,'emppass');
        break;
        case "empci":
            validarInput(expresiones.empci,e.target,'empci');
        break;
        case "empAp1":
            validarInput(expresiones.empAp1,e.target,'empAp1');
        break;
        case "empNo1":
            validarInput(expresiones.empNo1,e.target,'empNo1');
        break;
        case "empAp2":
            validarInput(expresiones.empAp2,e.target,'empAp2');
        break;
        case "empNo2":
            validarInput(expresiones.empNo2,e.target,'empNo2');
        break;
        case "esp":
            validarSelect(expresiones.esp,e.target,'esp');
        break;
        case "Fini":
            validarInput(expresiones.Fini,e.target,'Fini');
        break;
        case "Ffin":
            validarInput(expresiones.Ffin,e.target,'Ffin');
        break;
        case "dact":
            validarTexto(expresiones.dact,e.target,'dact');
        break;
        case "titref":
            validarInput(expresiones.titref,e.target,'titref');
        break;
        case "sex":
            validarSelect(expresiones.sex,e.target,'sex');
        break;
        case "ntel":
            validarInput(expresiones.ntel,e.target,'ntel');
        break;
    }
}

const validarInput = (expresion,input,campo) =>
{
    if(expresion.test(input.value))
    {
        if(`${campo}`=='empAp2'||`${campo}`=='empNo2')
        {
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
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
        if(`${campo}`=='empAp2'||`${campo}`=='empNo2')
        {
            if((`${campo}`=='empAp2')==null||(`${campo}`=='empNo2')==null)
            {
                document.getElementById(`${campo}`).classList.add('border-success','border-2');
                campos[campo] = false;
            }
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove('border-success','border-2');
            campos[campo] = false;
        }
        else
        {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove('border-success','border-2');
            campos[campo] = false;
        }
    }
}

const validarSelect = (expresion,select,campo)=>
{
    if(expresion.test(select.value))
    {
        document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
        campos[campo] = true;
    }
    else
    {
        document.getElementById(`${campo}`).classList.add('border-danger','border-2');
        document.getElementById(`${campo}`).classList.remove("bg-success");
        campos[campo] = false;
    }
}

const validarTexto = (expresion,texto,campo) =>
{
    if(expresion.test(texto.value))
    {
        
            document.getElementById(`${campo}`).classList.remove('border-danger','border-2');
            document.getElementById(`${campo}`).classList.add('border-success','border-2');
            campos[campo] = true;
    }
    else
    {
            document.getElementById(`${campo}`).classList.add('border-danger','border-2');
            document.getElementById(`${campo}`).classList.remove("bg-success");
            campos[campo] = false;
    }
}

inputs.forEach(
(inputs)=>
{
    inputs.addEventListener('keyup',validarFormulario);
    inputs.addEventListener('blur',validarFormulario);
})
selects.forEach(
    (selects)=>
    {
        selects.addEventListener('keyup',validarFormulario);
        selects.addEventListener('blur',validarFormulario);
    })

texto.forEach(
    (texto)=>
    {
        texto.addEventListener('keyup',validarFormulario);
        texto.addEventListener('blur',validarFormulario);
    })
formulario.addEventListener('submit',
(e)=>
{
    e.preventDefault();
    if(campos.empcorreo&&campos.emppass&&campos.empci&&campos.empAp1&&campos.empNo1&&campos.esp&&campos.Fini&&campos.Ffin&&campos.dact&&campos.titref&&campos.sex&&campos.ntel)
    {
        var datos = new FormData(formulario);
        fetch('regemp.php',
        {
            method:'POST',
            body: datos
        })
        .then(res => res.json())
        .then(data =>
            {
                console.log(data)
                if(data!='error')
                {
                    respuesta.innerHTML=`
                        <div class="alert alert-success rounded-4 fs-6 fw-bold text-center w-50" role="alert">
                            Registro Exitoso.<br>
                        </div>`
                    setTimeout(()=>
                    {
                        respuesta.innerHTML=``
                        formulario.reset();
                    }, 4000);
                    
                }
            })
    }
    else
    {
        
        respuesta.innerHTML=`
        <div class="alert alert-danger rounded-4 fs-6 fw-bold text-center w-25" role="alert">
            Por favor, rellene todos los campos.
        </div>`
        setTimeout(()=>
                    {
                        respuesta.innerHTML=``
                    }, 4000);
    }
})