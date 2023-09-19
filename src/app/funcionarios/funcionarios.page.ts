import { Component } from '@angular/core';

@Component({
  selector: 'app-funcionarios',
  templateUrl: './funcionarios.page.html',
  styleUrls: ['./funcionarios.page.scss'],
})

export class FuncionariosPage{
  isLoading: boolean = false;
  funcionariosCadastrados: any;

  constructor(){
    this.getFuncionarios()
  }

  getFuncionarios(){
    this.isLoading = true;
    fetch('http://localhost/exercicio/endpoints/funcionarios/listar_funcionario.php')
    .then(response => response.json())
    .then(response => {
      this.funcionariosCadastrados = response['funcionarios']
    })
    .catch(erro => {
      console.log(erro);
    })
    .finally(()=>{
      this.isLoading = false;
    })
  }


  pesquisarFuncionarioFiltrado(pesquisa: any, filtro: any){

  }


  cadastrarNovoFuncionario(dados: any){
    this.isLoading = true;
    fetch('http://localhost/exercicio/funcionario/inserir_funcionario.php',
			{
			  method: 'POST',
			  headers: {
			    'Content-Type': 'application/json',
			  },
			  body: JSON.stringify(
          { 
            nome: dados.Nome,
            sobrenome: dados.Sobrenome,
            cargo: dados.Cargo,
            salario: dados.Salario,
            datanasc: dados.DataNasc,
            pais: dados.Pais,
            cidade: dados.Cidade,
            cep: dados.CEP,
            endereco: dados.Endereco,
            fone: dados.Fone
          })
			}
		)
    .then(response => response.json())
    .then(response => {
      console.log(response);
    })
    .catch(erro => {
      console.log(erro);
    })
    .finally(()=>{
      this.isLoading = false;
    })  
  }


  atualizarFuncionario(id: any, dadosAtualizados: any){

  }


  deletarFuncionario(id: any){
    this.isLoading = true;
    fetch('http://localhost/exercicio/endpoints/funcionarios/remover_funcionario.php',
			{
			  method: 'POST',
			  headers: {
			    'Content-Type': 'application/json',
			  },
			  body: JSON.stringify({ CodFun: id, Acao: 'remover'})
			}
		)
    .then(response => response.json())
    .then(response => {
      console.log(response['mensagem']);
      this.getFuncionarios()
    })
    .catch(erro => {
      console.log(erro);
    })
    .finally(()=>{
      this.isLoading = false;
    })  
  }


}
