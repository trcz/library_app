<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200203103806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE UNIQUE INDEX UNIQ_A1C421615A4FB91E ON polka (numer)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BCA5EE0F6017FD2E ON mebel (nazwa)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_57352B686017FD2E ON pokoj (nazwa)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_BCA5EE0F6017FD2E ON mebel');
        $this->addSql('DROP INDEX UNIQ_57352B686017FD2E ON pokoj');
        $this->addSql('DROP INDEX UNIQ_A1C421615A4FB91E ON polka');
    }
}
