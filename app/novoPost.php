<style>

    textarea {
    resize: none;
    }
    textarea.ta10em {
    height: 10em;
    }

</style>

<script>

    class Post{

        constructor(){

            this.title       = null;
            this.description = null;
            this.postdate    = null;
            this.author      = null;

        }

        mountParams(){

            this.title       = document.getElementById('title');
            this.description = document.getElementById('description');
            this.postdate    = document.getElementById('postdate');
            this.author      = document.getElementById('author');

        }

        validateParams(){

            if(
                this.title.value.length === 0 ||
                this.title.value === '' ||
                this.title.value === null
            ) throw new Error("Informe o título corretamente");

            if(
                this.description.value.length === 0 ||
                this.description.value === '' ||
                this.description.value === null
            ) throw new Error("Informe a descrição corretamente");

            if(
                this.postdate.value.length === 0 ||
                this.postdate.value === '' ||
                this.postdate.value === null
            ) throw new Error("Informe a data da postagem corretamente");

            if(
                this.author.value.length === 0 ||
                this.author.value === '' ||
                this.author.value === null
            ) throw new Error("Informe o autor corretamente");

        }

        handleError(message){

            alert(message);

        }
        
        send(){
            
            let params = {

                title: title.value,
                description: description.value,
                postdate: postdate.value,
                author: author.value

            }

            api.post('/send-feed', params )

            .then((success)=>{

                console.log(success);

            })

            .catch((error)=>{

                console.log(error);

            })

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

<div class="table-responsive">

    <form onsubmit="return post.process()">

        <table class="table">
        
            <tr>        
                <td>Título da Postagem:</td>     
                <td>
                    <input type="text" class="form-control" id="title">
                </td>
            </tr>

            <tr>        
                <td>Descrição:</td>     
                <td>
                    <textarea class="form-control" rows="7" id="description"></textarea>
                </td>
            </tr>

            <tr>        
                <td>Data da Postagem:</td>     
                <td>
                    <input type="datetime-local" class="form-control" id="postdate"></textarea>
                </td>
            </tr>

            <tr>        
                <td>Autor:</td>     
                <td>
                    <input type="text" class="form-control" id="author">
                </td>
            </tr>

            <tr>        
                <td colspan="2" style="text-align:center;">
                
                    <button class="btn btn-info">Enviar</button>

                </td> 
            </tr>
        
        </table>

    </form>

</div>