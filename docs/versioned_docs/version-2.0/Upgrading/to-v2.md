---
sidebar_label: From v1 to v2
---
# Upgrading from v1 to v2

LmcAdmin v2 is a major version upgrade with many breaking changes that prevent
straightforward upgrading.

### Namespace change

The namespace has been changed from LmcAdmin to Lmc\Admin.

Please review your code to replace references to the `LmcAdmin` namespace
by the `Lmc\Admin` namespace.

### Default layout template name

The default layout template has been changed from `layout/admin` to `layout/lmcadmin`.

### Configuration key

The configuration key for LmcAdmin was changed from `lmcadmin` to `lmc_admin`. 
