<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200428010437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE comentario_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE profesion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE comentarios_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE posts_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comentario (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE profesion (id INT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE comentarios (id INT NOT NULL, comentario VARCHAR(255) NOT NULL, fecha_publicacion DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE posts (id INT NOT NULL, titulo VARCHAR(255) NOT NULL, likes VARCHAR(255) NOT NULL, foto VARCHAR(255) NOT NULL, fecha_publicacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, contenido VARCHAR(10000) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE comentario_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE profesion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE comentarios_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE posts_id_seq CASCADE');
        $this->addSql('DROP TABLE comentario');
        $this->addSql('DROP TABLE profesion');
        $this->addSql('DROP TABLE comentarios');
        $this->addSql('DROP TABLE posts');
    }
}
