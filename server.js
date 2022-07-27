const express = require('express');
const app = express();

const nodemailer = require("nodemailer");

const PORT = process.env.PORT || 80;

//Middleware
app.use(express.static('public'));
app.use(express.json())

app.get('/', (req, res)=>{
    res.sendFile(__dirname + '/public/contato.html')
})

app.post('/', (req, res)=>{
    console.log(req.body)

    const transporter = nodemailer.createTransport({
        host: 'smtp.office365.com',
        port: 587,
        secure:false,
        auth: {
            user: 'contato@eazyops.com.br',
            pass: 'tm4A<O<A'
        }
    })

    const mailOptions = {
        from: 'contato@eazyops.com.br',
        //from: req.body.email,
        to: 'contato@eazyops.com.br',
        subject: 'De: '+ req.body.email +' | Assunto: '+ req.body.subject,
        text: req.body.mensagem
    }

    transporter.sendMail(mailOptions, (error, info)=>{
        if(error){
            console.log(error);
            res.send('error');
        }else{
            console.log('E-mail enviado: '+ info.response);
            res.send('Sucesso')
        }
    })
})


app.listen(PORT, ()=>{
    console.log('server running on port ' + PORT)
})