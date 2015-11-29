#!/bin/bash

date >> $OPENSHIFT_REPO_DIR/logs/auto_fetch.log
echo "stock fetch started." >> $OPENSHIFT_REPO_DIR/logs/auto_fetch.log

/usr/local/zend/bin/php $OPENSHIFT_REPO_DIR/php/get_stock_history.php >> $OPENSHIFT_REPO_DIR/logs/auto_fetch.log

date >> $OPENSHIFT_REPO_DIR/logs/auto_fetch.log
echo "stock fetch finished." >> $OPENSHIFT_REPO_DIR/logs/auto_fetch.log

