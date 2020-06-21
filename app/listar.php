
    <div id="content">
        <br>
        <br>
        <br>
        <br>
        
        <center>Carregando...</center>
    </div>

    <script id="templateFeedNews" type="x-handlebars-template">

        <div class="table-responsive table-striped">

            <table class="table">

                <thead>

                    <tr class="alert alert-info" style="font-weight: bold">
                        <td>Título:</td>
                        <td>Descrição:</td>
                        <td>Data da Postagem:</td>
                        <td>Autor:</td>
                    </tr>

                </thead>

                <tbody>

                    {{#each content}}

                        <tr>
                            <td>{{{isNull title}}}</td>
                            <td>{{{isNull description}}}</td>
                            <td>{{{isNull postdate}}}</td>
                            <td>{{{isNull author}}}</td>
                        </tr>

                    {{/each}}

                </tbody>

            </table>

        </div>

    </script>

    <script>
        
        function mountTable(json){

            json = {

                content: json

            };

            let templateBruto     = document.getElementById('templateFeedNews').innerHTML;
            let templateCompilado = Handlebars.compile(templateBruto);	

            Handlebars.registerHelper('isNull',  (value) => {
               
                if(value === null || value.length === 0 || value === '')
                    return "<span class='badge badge-danger'>Não Consta</span>";

                return value;

            });

            let HTMLGerado        = templateCompilado(json);        
            document.getElementById('content').innerHTML = HTMLGerado;
            
        }

        api.get('/feednews')

        .then((success)=>{

            if(typeof success.status !== 'undefined' && success.status === 200){

                mountTable(success.data);

            } else {

                throw new Error("Falha");

            }

            
        })
        .catch((error)=>{

            console.log(error);

        });
        
    
    </script>