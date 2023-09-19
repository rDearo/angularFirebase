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
    fetch('http://localhost/exercicio/endpoints/funcionarios/inserir_funcionario.php',
			{
			  method: 'POST',
			  headers: {
			    'Content-Type': 'application/json',
			  },
			  body: JSON.stringify(
          { 
            Nome: dados.nome,
            Sobrenome: dados.sobrenome,
            Cargo: dados.cargo,
            Salario: dados.salario,
            dataNasc: dados.dataNasc,
            Pais: dados.pais,
            cidade: dados.cidade,
            CEP: dados.cep,
            Endereco: dados.endereco,
            Fone: dados.fone
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
    this.isLoading = true;
    fetch('http://localhost/exercicio/endpoints/funcionarios/atualizar_funcionario.php',
			{
			  method: 'PUT',
			  headers: {
			    'Content-Type': 'application/json',
			  },
			  body: JSON.stringify(
          { 
            CodFun: id,
            Nome: dadosAtualizados.nome,
            Sobrenome: dadosAtualizados.sobrenome,
            Cargo: dadosAtualizados.cargo,
            Salario: dadosAtualizados.salario,
            DataNasc: dadosAtualizados.dataNasc,
            Pais: dadosAtualizados.pais,
            Cidade: dadosAtualizados.cidade,
            CEP: dadosAtualizados.cep,
            Endereco: dadosAtualizados.endereco,
            Fone: dadosAtualizados.fone
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


  deletarFuncionario(id: any){
    this.isLoading = true;
    fetch('http://localhost/exercicio/endpoints/funcionarios/remover_funcionario.php',
			{
			  method: 'DELETE',
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
