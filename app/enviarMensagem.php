<script>

    class Post{

        constructor(){

            this.from    = null;
            this.to      = null;
            this.message = null;
            this.apiurl  = null;

        }

        handleError(message){

            alert(message);

        }

        mountParams(){

            this.from    = document.getElementById('from');
            this.to      = document.getElementById('to');
            this.message = document.getElementById('message');
            this.apiurl  = document.getElementById('apiurl');

        }

        validateParams(){

            if(
                this.from.value === null ||
                this.from.value.length === 0 ||
                this.from.value === ''
            ) throw new Error('Informe o seu nome corretamente');

            if(
                this.to.value === null ||
                this.to.value.length === 0 ||
                this.to.value === ''
            ) throw new Error('Informe o nome do destinatário corretamente');

            if(
                this.message.value === null ||
                this.message.value.length === 0 ||
                this.message.value === ''
            ) throw new Error('Informe a mensagem corretamente');

            if(
                this.apiurl.value === null ||
                this.apiurl.value.length === 0 ||
                this.apiurl.value === ''
            ) throw new Error('Informe a URL da API corretamente');


        }

        resetForm(){

            this.from.value = '';
            this.to.value = '';
            this.message.value = '';
            this.apiurl.value = '';

        }

        send(){

            let json ={

                from: this.from.value,
                to: this.to.value,
                message: this.message.value,
                apiurl: this.apiurl.value  

            };

            api.post('/send-message-friend', json)

            .then((success)=>{

                if(typeof success.status !== 'undefined' && success.status === 200){
                        
                    alert(success.data);
                    
                    post.resetForm();
                
                } else {
                    
                    throw new Error('Falha ao enviar a postagem');

                }

            })

            .catch((error)=>{
        
                post.handleError('Erro ao enviar mensagem');

            });

        }

        process(){

            try{

                this.mountParams();
                this.validateParams();
                this.send();

            } catch(e){

                this.handleError(e.message);

            }

            return false;

        }

    }

    const post = new Post();

</script>

<center>
    <div class="table-responsive" id="container">

        <form onsubmit="return post.process()">

            <table class="table">

                <tbody>
                    <tr>
                        <td>De:</td>
                        <td>
                            <input 
                                type="text" 
                                class="form-control" 
                                placeholder="Seu Nome" 
                                id="from">
                        </td>
                    </tr>

                    <tr>
                        <td>Para:</td>
                        <td>
                            <input 
                                type="text" 
                                class="form-control" 
                                placeholder="Nome do destinatário" 
                                id="to">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Mensagem:</td>
                        <td>
                            <textarea 
                                class="form-control" 
                                rows="7" 
                                id="message"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>API URL:</td>
                        <td>
                            <input 
                                type="text" 
                                class="form-control" 
                                placeholder="Exemplo: https://api.site.com.br/message/send" 
                                id="apiurl">
                        </td>
                    </tr>
                    
                    <tr>
                        <td 
                            colspan="2"
                            style="text-align:center;"    
                        >
                                
                            <button class="btn btn-info">Enviar</button>

                        </td>
                    </tr>

                </tbody>

            </table>

        </form>

    </div>
</center>