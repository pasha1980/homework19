<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200701124714 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('create table users 
(
	id int auto_increment,
	email varchar(255) not null,
	name varchar(255) not null,
	password varchar(255) not null,
	constraint users_pk
		primary key (id)
);
');
        $this->addSql("create table logs
(
    id int auto_increment,
    action enum('create', 'update', 'delete') not null,
    old_data json null,
    new_data json null,
    constraint logs_pk
        primary key (id)
);");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
