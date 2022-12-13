<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212131501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE individuelclient DROP FOREIGN KEY FK_9B96C69FD725330D');
        $this->addSql('DROP INDEX IDX_9B96C69FD725330D ON individuelclient');
        $this->addSql('ALTER TABLE individuelclient ADD agence VARCHAR(255) DEFAULT NULL, ADD nom_agence VARCHAR(255) DEFAULT NULL, ADD code_agence VARCHAR(255) DEFAULT NULL, DROP agence_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE individuelclient ADD agence_id INT DEFAULT NULL, DROP agence, DROP nom_agence, DROP code_agence');
        $this->addSql('ALTER TABLE individuelclient ADD CONSTRAINT FK_9B96C69FD725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('CREATE INDEX IDX_9B96C69FD725330D ON individuelclient (agence_id)');
    }
}
