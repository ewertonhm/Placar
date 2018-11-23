CREATE TABLE score(
        id SERIAL PRIMARY KEY,
	nome VARCHAR(50),
	pontos INTEGER
);

insert into score(nome, pontos) values ('player1',0);

insert into score(nome, pontos) values ('player2',0);