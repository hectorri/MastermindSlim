#!/bin/bash

source bin/endpoints.sh

echo -e "# MODO DE USO:\n\n"

for i in {4..4}
do
    echo "## ${ttl[$i]}:"
    echo
    echo "Petición $i:"
    echo "\`\`\`"
    echo "\$ ${cmd[$i]}"
    echo "\`\`\`"
    echo
    echo "Respuesta $i:"
    echo "\`\`\`"
    ${cmd[$i]}
    echo
    echo "\`\`\`"
    echo
    echo
done
